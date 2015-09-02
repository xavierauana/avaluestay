// Generated by CoffeeScript 1.9.3
(function() {
  var helpers;

  helpers = function() {
    return {
      getQueryString: function() {
        var name, regex, results;
        name = window.location.href.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
        results = regex.exec(location.search);
        if (results === null) {
          return "";
        } else {
          return decodeURIComponent(results[1].replace(/\+/g, " "));
        }
      }
    };
  };

}).call(this);

//# sourceMappingURL=JShelpers.js.map
