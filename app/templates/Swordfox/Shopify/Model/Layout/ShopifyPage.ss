<main class="">
	<div class="u-container">

		<div class="u-content">           
        
            <% include CollectionsList Title=Collections %>

            <% if $AllProducts %>
                <section class="products__summaries--grid">
                    <% loop $AllProducts %>
                        <% include Includes/ProductSummary %>
                    <% end_loop %>
                </section>
        
                <section class="pagination">
                    <% with $AllProducts %>
                        <% include Includes/Pagination %>
                    <% end_with %>
                </section>
            <% end_if %>

        </div>

	</div>

	$ElementalArea

</main>