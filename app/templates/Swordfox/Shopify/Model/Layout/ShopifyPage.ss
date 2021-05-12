<main class="">
	<div class="u-container">

		<div class="u-content">
            
            <div class="content-container unit size3of4 lastUnit">
                <article>
                
                    <h1>Collections</h1>

                    <% if Collections %>
                        <% loop Collections %>
                            <h3><a href="/products/collection/$URLSegment">$Title</a></h3>
                        <% end_loop %>
                    <% end_if %>

                    <h1>$Title</h1>
                    <div class="content">$Content</div>

                    <% if $AllProducts %>
                    <section class="content center unit size1of1 lastUnit">
                        <% loop $AllProducts %>
                        <% include Swordfox\\Shopify\\Product %>
                        <% end_loop %>
                    </section>

                    <section class="content center unit size1of1 lastUnit">
                        <% with $AllProducts %>
                        <% include Swordfox\\Shopify\\Pagination %>
                        <% end_with %>
                    </section>
                    <% end_if %>
                </article>
            </div>

        </div>

	</div>

	$ElementalArea

</main>