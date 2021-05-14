<main class="">
	<div class="u-container">

		<div class="product__view u-content u-col-wrapper">
            
            <section class="product__images u-col w1x2">
                <% if Images.Count %>

                    <% with Images.Sort(Sort).First %>
                        <div class="product__image-slide product__image-slide--first">
                            <img src="https://images.weserv.nl/?w=500&amp;url={$Top.URLEncode($OriginalSrc)}" alt="" width="500" />
                        </div>
                    <% end_with %>

                    <% if Images.Count > 1 %>
                        <div class="product__image-thumbnails">
                            <% loop Images.Sort(Sort) %>
                                <div class="product__image-slide">
                                    <img src="https://images.weserv.nl/?w=85&amp;h=85&amp;fit=cover&amp;url={$Top.URLEncode($OriginalSrc)}" alt="$Title">
                                </div>
                            <% end_loop %>
                        </div>
                    <% end_if %>

                <% end_if %>
            </section>

            <section class="product__details u-col w1x2">

                <h1 class="product__title">$Title</h1>

                $Content

                <p class="product__price">
                    $Price.RAW
                </p>

                <div id="product-component" data-shopifyid="{$ShopifyID}" data-shopifytitle="$Title.XML" data-shopifyprice="$PriceOnly" data-shopifylink="$Link"></div>
            </section>

        </div>

        <% if RelatedProducts %>
            <section class="products__summaries products__summaries--related u-content">
                <h3>You might also like</h3>
                <% loop RelatedProducts %>
                    <% include Includes/ProductSummary %>
                <% end_loop %>
            </section>
        <% end_if %>

    </div>

    $ElementalArea

</main>

<script type="text/javascript">
    /*<![CDATA[*/
    (function() {
        console.log('in');
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
            console.log('test');
            var client = ShopifyBuy.buildClient({
                domain: '{$shopify_domain}',
                storefrontAccessToken: '{$storefront_access_token}',
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