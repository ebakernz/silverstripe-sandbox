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

                <div class="product__tags">

                    <% if ProductType || Collections || Tags %>
                        <p><strong>Product Information:</strong></p>
                    
                        <% if ProductType %>
                            <p>Product Type: $ProductType</p>
                        <% end_if %>
                    
                        <% if Collections %>
                            <p>Collections: <% loop Collections %><a href="$Link">$Title</a><% if not Last %>, <% end_if %><% end_loop %></p> 
                        <% end_if %>

                        <% if Tags %>
                            <p>Tags: <% loop Tags %>$Title<% if not Last %>, <% end_if %><% end_loop %></p>
                        <% end_if %>
                        
                        <% if ProductsWithTag %>
                            <p>Products with same tag: <% loop ProductsWithTag %><a href="$Link">$Title</a><% if not Last %>, <% end_if %><% end_loop %></p>
                        <% end_if %>

                    <% end_if %>
                    
                </div>
            </section>

            
        </div>

        <% if RelatedProducts %>
            <div class="products__summaries u-content">
                <h3 class="products__summaries-title">You might also like</h3>

                <section class="products__summaries--grid products__summaries--related">                    
                    <% loop RelatedProducts %>
                        <% include Includes/ProductSummary %>
                    <% end_loop %>
                </section>
                
            </div>
        <% end_if %>

    </div>

    $ElementalArea

</main>

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