<main class="">
	<div class="u-container">

		<div class="u-content">
            
            <% include CollectionsList Title=Collections %>

            <h3>$Title</h3>
            
            <% if $ProductsPaginated %>
                <section class="products__summaries--grid">
                    <% loop $ProductsPaginated %>
                        <% include Includes/ProductSummary %>
                    <% end_loop %>
                </section>
        
                <section class="pagination">
                    <% with $ProductsPaginated %>
                        <% include Includes/Pagination %>
                    <% end_with %>
                </section>
            <% end_if %>

        </div>

	</div>

	$ElementalArea

</main>