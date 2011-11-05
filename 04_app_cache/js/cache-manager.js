(function () {
  
  var CacheManager = window.CacheManager = function (pageSelector) {
    this.page = $(pageSelector);
  };

  var proto = {};

  proto.ensureFreshContent = function (selector, updateURL) {
    var appCache = window.applicationCache,
        showCached;

    // If browser doesn't support cache manifest, move along.
    if (!appCache) return;

    this.selector  = selector;
    this.updateURL = updateURL;
    
    showCached = $.proxy(this.showCached, this);
    
    // If there's nothing to update, we'll show the cached version
    appCache.addEventListener('cached', showCached, false);
    appCache.addEventListener('error', showCached, false);
    appCache.addEventListener('noupdate', showCached, false);
    appCache.addEventListener('obsolete', showCached, false);

    // But if we recognize an update, swap out the cache & display it.
    appCache.addEventListener('updateready', $.proxy(this.updateCache, this), false);
    
    this.page.live('pageshow', $.proxy(this.checkCache, this));
  };

  proto.checkCache = function () {
    // Hide the content until we know we have the latest
    $.mobile.showPageLoadingMsg();
    $(this.selector).hide();

    try {
      // Kick off the update
      window.applicationCache.update();
      // Android browser may not fire event on appCache,
      // depending which page was loaded in jQM. Workaround until a fix found:
      this.updateCacheTimer = setTimeout($.proxy(this.updateCache, this), 10000);
    } catch (e) {
      // If it failed, just show the cached data.
      // We could call this.updateCache() here, but this may fire on first load.
      this.showCached();
    }
  };

  proto.showCached = function (evt) {
    clearTimeout(this.updateCacheTimer);
    $(this.selector).show();
    $.mobile.hidePageLoadingMsg();
  };

  proto.updateCache = function (evt) {
    var self = this;

    clearTimeout(this.updateCacheTimer);

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
