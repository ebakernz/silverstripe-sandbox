<% if Collections %>
    <div class="collections">
        <% if Title != '' %><h4>$Title</h4><% end_if %>
        <ul class="collections-list">
            <% loop Collections %>
                <li class="collections-list__item"><a href="$Link">$Title</a></li>
            <% end_loop %>
        </ul>
    </div>
<% end_if %>