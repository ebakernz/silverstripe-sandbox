<div class="e-homepage-collection">

    <% if $Title && $ShowTitle %><div class="u-container u-content"><h3 class="e-homepage-collection__title">$Title</h3></div><% end_if %>

    <div class="u-container u-content <% if DisplayPageFullWidth %> u-container--full-width u-container--no-padding<% end_if %>">

        <% if CollectionProducts %>
        
            <section class="products__summaries products__summaries--grid">
                <% loop CollectionProducts %>
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
