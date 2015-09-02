if document.getElementById('creditForm')
  creditFromVue = new Vue
    el: "#creditForm"
    data:
      numberOfCredit: 10
      pricePerCredit: 10
      rowsOfOption: 10
      subtotal: ""
      baseUrl: "http://avaluestay.dev"
    methods:
      updateSubtotal: (e)->
        this.subtotal = this.pricePerCredit * parseInt(e.target.value)

      consolidateData: (e)->
        e.preventDefault()
        $('input[name="amount"]').val(this.subtotal)
        $('input[name="price"]').val(this.pricePerCredit)
        this.constructRedirectUrls();

        e.target.submit()

      constructRedirectUrls: ->
        queryArray = [
          key: $('input[name="package"]').attr('name'), value:$('input[name="package"]').val()
        ,
          key: $('input[name="amount"]').attr('name'), value:$('input[name="amount"]').val()
        ,
          key: $('input[name="payeeId"]').attr('name'), value:$('input[name="payeeId"]').val()
        ,
          key: $('input[name="sellerId"]').attr('name'), value:$('input[name="sellerId"]').val()
        ]
        temp = []
        queryArray.map (item)->
          temp.push item.key + "=" + encodeURIComponent(item.value)
        queryString = temp.join "&"

        $('input[name="successUrl"]').val(this.baseUrl+"/pSuccess"+queryString)
        $('input[name="failUrl"]').val(this.baseUrl+"/pFail"+queryString)
        $('input[name="errorUrl"]').val(this.baseUrl+"/pError"+queryString)
    ready: ->
      this.subtotal = this.numberOfCredit * this.pricePerCredit