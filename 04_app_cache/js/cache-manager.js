(function (context) {
  
  var CacheManager = context.CacheManager = function (pageSelector) {
    this.page = $(pageSelector);
  };

  var proto = {};

  proto.ensureFreshContent = function (selector, updateURL) {
    this.content   = $(selector);
    this.updateURL = updateURL;
    this.page.live('pageshow', $.proxy(this.checkCache, this));
    this.checkCache();
  };

  proto.checkCache = function () {
    // Note that we could (TODO) implement some sort of caching solution using
    // various local storage mechanisms for browsers that support, say,
    // IE User Data, but not HTML5 cache manifests
    var appCache = window.applicationCache,
        showCached;

    // If browser doesn't support cache manifest, move along.
    if (!appCache) return;

    showCached = $.proxy(this.showCached, this);

    // Otherwise, hide the content until we know we have the latest
    // (TODO: display a loading indicator)
    $.mobile.showPageLoadingMsg();
    this.content.hide();

    // If there's nothing to update, we'll show the cached version
    appCache.addEventListener('cached', showCached, false);
    appCache.addEventListener('error', showCached, false);
    appCache.addEventListener('noupdate', showCached, false);
    appCache.addEventListener('obsolete', showCached, false);

    // But if we recognize an update, swap out the cache & display it.
    appCache.addEventListener('updateready', $.proxy(this.updateCache, this), false);

    // Kick off the update
    appCache.update();
  }

  proto.showCached = function (evt) {
    this.content.show();
    $.mobile.hidePageLoadingMsg();
  }

  proto.updateCache = function (evt) {
    var self = this;

    window.applicationCache.swapCache();
    // .swapCache() has retrieved the updated MANIFEST,
    // but we still need to retrieve the updated resource.
    // AJAX request to get updated dynamic data.
    // This will only get fresh data if the manifest
    // has been updated.
  console.log(self)
  console.log(self.updateURL)
    $.get(self.updateURL, function(data) {
      self.content.html(data).show();
      self.content.listview('refresh');
      $.mobile.hidePageLoadingMsg();    
    });


  }

  CacheManager.prototype = proto;

}(this));
