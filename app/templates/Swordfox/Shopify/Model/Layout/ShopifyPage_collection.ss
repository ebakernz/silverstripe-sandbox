<main class="">
	<div class="u-container">

		<div class="u-content">
            
            <% if Collections %>
                <div class="collections">
                    <h1>Collections</h1>
                    <ul class="collections-list">
                        <% loop Collections %>
                            <li class="collections-list__item"><a href="/products/collection/$URLSegment">$Title</a></li>
                        <% end_loop %>
                    </ul>
                </div>
            <% end_if %>

            <h1>$Title</h1>

            <% if $AllProducts %>
                <section class="products__summaries">
                    <% loop $AllProducts %>
                        <% include Includes/ProductSummary %>
                    <% end_loop %>
                </section>

                <section class="">
                    <% with $AllProducts %>
                        <% include Includes/Pagination %>
                    <% end_with %>
                </section>
            <% end_if %>

        </div>

	</div>

	$ElementalArea

</main>