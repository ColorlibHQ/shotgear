/**
 * Shotgear front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel and AjaxChimp that build the same markup,
 * so the theme's stylesheets apply unchanged. The gallery filter, which used
 * jQuery Filterizr, is written out here (see below).
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  UI.owl('.client_logo_slider', {
    items: 6,
    loop: true,
    responsive: {
      0: { items: 3, margin: 15 },
      600: { items: 3, margin: 15 },
      991: { items: 5, margin: 15 },
      1200: { items: 6, margin: 15 }
    }
  });

  UI.enhanceSelects('select');

  // menu fixed js code
  window.addEventListener('scroll', function () {
    var fixed = window.pageYOffset + 1 > 50;
    UI.toElements('.main_menu').forEach(function (menu) {
      ['menu_fixed', 'animated', 'fadeInDown'].forEach(function (name) {
        menu.classList.toggle(name, fixed);
      });
    });
  }, { passive: true });

  UI.ready(function () {
    // Search Toggle
    var box = document.getElementById('search_input_box');
    var open = document.getElementById('search_1');
    var close = document.getElementById('close_search');
    if (box) {
      box.style.display = 'none';
      if (open) {
        open.addEventListener('click', function () {
          UI.slide(box, 'toggle');
          var input = document.getElementById('search_input');
          if (input) input.focus();
        });
      }
      if (close) {
        close.addEventListener('click', function () {
          UI.slide(box, 'up', 500);
        });
      }
    }
  });

  //------- Mailchimp js --------//
  UI.ajaxChimp('#mc_embed_signup form');

  /* ------------------------------------------------------------------ *
   * Gallery filter: what jQuery Filterizr 2 did with { layout: 'packed' },
   * with the same inline styles. The .filtr-item tiles are positioned
   * absolutely by a bin packer: in order, each goes into the first gap it
   * fits, and rows grow downwards. A click on any [data-filter] element shows
   * the tiles whose comma-separated data-category holds that value ('all':
   * every tile); the others fade and shrink out, and tiles slide to their
   * new places over 0.5s.
   * ------------------------------------------------------------------ */

  var TILE_OUT = { opacity: '0', transform: 'scale(0.5)' };
  var TILE_IN = { opacity: '1', transform: 'scale(1)' };

  /** jQuery's innerWidth()/innerHeight(): content plus padding, fractional. */
  function innerSize(el) {
    var cs = window.getComputedStyle(el);
    var w = parseFloat(cs.width) || 0;
    var h = parseFloat(cs.height) || 0;
    if (cs.boxSizing === 'border-box') {
      w -= parseFloat(cs.borderLeftWidth) + parseFloat(cs.borderRightWidth);
      h -= parseFloat(cs.borderTopWidth) + parseFloat(cs.borderBottomWidth);
    } else {
      w += parseFloat(cs.paddingLeft) + parseFloat(cs.paddingRight);
      h += parseFloat(cs.paddingTop) + parseFloat(cs.paddingBottom);
    }
    return { w: w, h: h };
  }

  /** Filterizr's packer (a growing binary-tree packer that only grows down). */
  function pack(width, blocks) {
    var root = { x: 0, y: 0, w: width, h: blocks.length ? blocks[0].h : 0 };
    function find(node, w, h) {
      if (node.used) return find(node.right, w, h) || find(node.down, w, h);
      return w <= node.w && h <= node.h ? node : null;
    }
    function split(node, w, h) {
      node.used = true;
      node.down = { x: node.x, y: node.y + h, w: node.w, h: node.h - h };
      node.right = { x: node.x + w, y: node.y, w: node.w - w, h: h };
      return node;
    }
    function growDown(w, h) {
      root = {
        used: true, x: 0, y: 0, w: root.w, h: root.h + h,
        down: { x: 0, y: root.h, w: root.w, h: h },
        right: root
      };
      var node = find(root, w, h);
      return node ? split(node, w, h) : null;
    }
    var positions = blocks.map(function (block) {
      var node = find(root, block.w, block.h);
      var fit = node ? split(node, block.w, block.h) : growDown(block.w, block.h);
      // Only a tile wider than the gallery has no fit (Filterizr threw there).
      return fit ? { left: fit.x, top: fit.y } : { left: 0, top: 0 };
    });
    return { positions: positions, height: root.h };
  }

  function initGallery(container) {
    var duration = UI.reducedMotion ? 0 : 0.5;
    var filter = 'all';
    var width = 0;
    var tiles = UI.toElements('.filtr-item', container).map(function (el) {
      return { el: el, left: 0, top: 0, out: false, w: 0, h: 0 };
    });

    function place(tile, css) {
      tile.el.style.opacity = css.opacity;
      tile.el.style.transform = css.transform + ' translate3d(' + tile.left + 'px,' + tile.top + 'px, 0)';
    }
    // Once a tile has finished fading out it goes behind the others.
    function settle(tile) {
      tile.el.classList.toggle('filteredOut', tile.out);
      tile.el.style.zIndex = tile.out ? '-1000' : '';
    }
    function measure() {
      width = innerSize(container).w;
      tiles.forEach(function (tile) {
        var size = innerSize(tile.el);
        tile.w = size.w;
        tile.h = size.h;
      });
    }
    function matches(tile) {
      if (filter === 'all') return true;
      var categories = (tile.el.getAttribute('data-category') || '').split(/\s*,\s*/);
      return categories.indexOf(filter) !== -1;
    }
    function render() {
      var shown = tiles.filter(matches);
      tiles.forEach(function (tile) {
        if (shown.indexOf(tile) !== -1) return;
        tile.out = true;
        place(tile, TILE_OUT); // shrinks where it last stood
        if (!duration) settle(tile);
      });
      var layout = pack(width, shown);
      container.style.height = layout.height + 'px';
      shown.forEach(function (tile, i) {
        tile.left = layout.positions[i].left;
        tile.top = layout.positions[i].top;
        tile.out = false;
        place(tile, TILE_IN);
        if (!duration) settle(tile);
      });
    }

    var cs = container.style;
    cs.padding = '0';
    cs.position = 'relative';
    cs.width = '100%';
    cs.display = 'flex';
    cs.flexWrap = 'wrap';
    tiles.forEach(function (tile) {
      var s = tile.el.style;
      s.opacity = TILE_OUT.opacity;
      s.transform = TILE_OUT.transform;
      s.backfaceVisibility = 'hidden';
      s.perspective = '1000px';
      s.transformStyle = 'preserve-3d';
      s.position = 'absolute';
      s.transition = 'all ' + duration + 's ease-out 0ms';
      tile.el.addEventListener('transitionend', function () { settle(tile); });
    });

    UI.toElements('[data-filter]').forEach(function (control) {
      control.addEventListener('click', function () {
        filter = String(control.getAttribute('data-filter'));
        render();
      });
    });
    window.addEventListener('resize', UI.debounce(function () {
      measure();
      render();
    }, 250));

    // Measuring also makes the browser apply the start styles above, so the
    // first render animates the tiles into place, as Filterizr's did.
    measure();
    render();
  }

  UI.ready(function () {
    UI.toElements('.filtr-container').forEach(function (container) {
      // The services widget also carries .filtr-container on the front page,
      // with no tiles in it: nothing to filter there.
      if (container.querySelector('.filtr-item')) initGallery(container);
    });
  });

  UI.ready(function () {
    var items = UI.toElements('.portfolio-filter ul li');
    items.forEach(function (item) {
      item.addEventListener('click', function () {
        items.forEach(function (li) { li.classList.remove('active'); });
        item.classList.add('active');
      });
    });
  });

  UI.owl('.review_slider', {
    items: 1,
    loop: true,
    dots: true,
    autoplay: false,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: false
  });
}());
