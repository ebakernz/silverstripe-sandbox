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