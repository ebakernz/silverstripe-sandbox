<main class="">
	<div class="u-container">

		<div class="u-content">
            
            <% if Collections %>
                <div class="collections">
                    <h4>Collections</h4>
                    <ul class="collections-list">
                        <% loop Collections %>
                            <li class="collections-list__item"><a href="$Link">$Title</a></li>
                        <% end_loop %>
                    </ul>
                </div>
            <% end_if %>

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