// Generated by CoffeeScript 1.9.3
(function() {
  var registration;

  if (document.getElementById("registration")) {
    registration = new Vue({
      el: "#registration",
      data: {
        currentTab: null
      },
      methods: {
        deleteItem: function(e) {
          var button, objectId, token, url;
          button = e.target;
          url = e.target.dataset.url;
          objectId = e.target.dataset.id;
          token = $('meta[name="csrf-token"]').attr('content');
          if (objectId) {
            $.ajaxSetup;
            ({
              headers: {
                'X-CSRF-TOKEN': token
              }
            });
            return $.ajax({
              url: "/" + url + "/" + objectId,
              method: "delete"
            }).success(function(data) {
              if (data.response === "completed") {
                return $(button).parents(".completedSet").remove();
              }
            });
          } else {
            return $(button).parents(".completedSet").remove();
          }
        },
        getProperty: function() {
          var id, self;
          self = this;
          id = window.location.pathname.replace("/properties/next/", "");
          $.ajax({
            url: "/properties/" + id,
            dataType: 'json'
          }).success(function(data) {
            self.$set("property", data);
            return console.log(data);
          });
          return true;
        },
        submit: function() {
          var forms, token;
          forms = $("#" + this.currentTab).find("form.autoSubmit");
          if (forms) {
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': token
              }
            });
            console.log(forms);
            forms.map(function(index, DomForm) {
              var form, method, request, url;
              console.log(DomForm);
              form = $(DomForm);
              url = form.attr("action");
              method = form.attr("method");
              console.log(url, method, token);
              request = $.ajax({
                url: url,
                method: method,
                data: $(form).serialize(),
                dataType: "json"
              });
              request.success(function(data) {
                return console.log(data);
              });
              return "";
            });
          }
          return "";
        },
        resetActiveTab: function(e) {
          $("#" + this.currentTab).removeClass("active");
          this.submit();
          this.currentTab = e.target.dataset.tab;
          return $("#" + this.currentTab).addClass("active");
        },
        addMoreService: function(e) {
          var template;
          e.preventDefault();
          template = $("fieldset.hidden").clone().removeClass().addClass("completedSet");
          $(e.target).before(template);
          return false;
        }
      },
      ready: function() {
        this.currentTab = "basic";
        this.getProperty();
        $("#" + this.currentTab).addClass("active");
        console.log("vue ready");
        return console.log($("a[role='tab']"));
      }
    });
  }

}).call(this);

//# sourceMappingURL=registration.js.map
