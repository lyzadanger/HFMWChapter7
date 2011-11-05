(function () {
  
  var CacheManager = window.CacheManager = function (pageSelector) {
    this.page = $(pageSelector);
  };

  var proto = {};

  proto.ensureFreshContent = function (selector, updateURL) {
    this.selector  = selector;
    this.updateURL = updateURL;
    this.page.live('pageshow', $.proxy(this.checkCache, this));
  };

  proto.checkCache = function () {
    var appCache = window.applicationCache,
        showCached;

    // If browser doesn't support cache manifest, move along.
    if (!appCache) return;

    showCached = $.proxy(this.showCached, this);

    // Otherwise, hide the content until we know we have the latest
    $.mobile.showPageLoadingMsg();
    $(this.selector).hide();

    if (!window.addedCacheListeners) {
      // If there's nothing to update, we'll show the cached version
      appCache.addEventListener('cached', showCached, false);
      appCache.addEventListener('error', showCached, false);
      appCache.addEventListener('noupdate', showCached, false);
      appCache.addEventListener('obsolete', showCached, false);

      // But if we recognize an update, swap out the cache & display it.
      appCache.addEventListener('updateready', $.proxy(this.updateCache, this), false);
      window.addedCacheListeners = true;
    }

    // Kick off the update
    try {
      appCache.update();
    } catch (e) {
      this.updateCache();
    }
  };

  proto.showCached = function (evt) {
    $(this.selector).show();
    $.mobile.hidePageLoadingMsg();
  };

  proto.updateCache = function (evt) {
    var self = this;

    // AJAX request to get updated dynamic data
    $.get(self.updateURL, function(data) {
      $(self.selector).html(data).show();
      $.mobile.hidePageLoadingMsg();    
      $(self.selector).listview().listview('refresh');
    });

    try {
      window.applicationCache.swapCache();
    } catch (e) {}

  };

  CacheManager.prototype = proto;

}());
