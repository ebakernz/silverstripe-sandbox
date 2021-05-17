<div class="e-shopify-product">

    <% if $Title && $ShowTitle %><div class="u-container u-content"><h3 class="e-shopify-product__title">$Title</h3></div><% end_if %>

    <div class="u-container <% if DisplayPageFullWidth %> u-container--full-width u-container--no-padding<% end_if %>">
        
        <% loop Product %>

            <div class="product__view u-content u-col-wrapper">
            
                <section class="product__images u-col w1x2">
                    <% if Images.Count %>    
                        <% with Images.Sort(Sort).First %>
                            <div class="product__image-slide product__image-slide--first">
                                <img src="https://images.weserv.nl/?w=500&amp;url={$Top.URLEncode($OriginalSrc)}" alt="" width="500" />
                            </div>
                        <% end_with %>    
                    <% end_if %>
                </section>
    
                <section class="product__details u-col w1x2">    
                    <h1 class="product__title">$Title</h1>

                    <p class="product__price">
                        $Price.RAW
                    </p>
    
                    <div id="product-component" data-shopifyid="{$ShopifyID}" data-shopifytitle="$Title.XML" data-shopifyprice="$PriceOnly" data-shopifylink="$Link"></div>
                </section>
    
            </div>

        <% end_loop %>

    </div>
</div>

<script type="text/javascript">
    /*<![CDATA[*/
    (function() {
        var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
        if (window.ShopifyBuy) {
            if (window.ShopifyBuy.UI) {
                ShopifyBuyInit();
            } else {
                loadScript();
            }
        } else {
            loadScript();
        }

        function loadScript() {
            var script = document.createElement('script');
            script.async = true;
            script.src = scriptURL;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
            script.onload = ShopifyBuyInit;
        }

        function ShopifyBuyInit() {
            var client = ShopifyBuy.buildClient({
                domain: '{$ShopifyDomain}',
                storefrontAccessToken: '{$StorefrontAccessToken}',
            });
            ShopifyBuy.UI.onReady(client).then(function(ui) {
                ui.createComponent('product', {
                    id: document.getElementById('product-component').getAttribute('data-shopifyid'),
                    node: document.getElementById('product-component'),
                    moneyFormat: '%24%7B%7Bamount%7D%7D',
                    options: {
                        "product": {
                            "contents": {
                                "img": false,
                                "button": false,
                                "buttonWithQuantity": true,
                                "title": false,
                                "price": false
                            }
                        }
                    },
                });
            });
        }
    })();
    /*]]>*/
</script>