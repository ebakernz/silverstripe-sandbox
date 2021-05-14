<% if MoreThanOnePage %>
    <div class="pagination ">    
        <% if NotFirstPage %>
            <ul class="previous">
                <li><a href="$PrevLink"><span></span></a></li>
            </ul>
        <% end_if %>
        <ul class="hidden-xs">
            <% loop $PaginationSummary %>
                <% if $Link %>
                    <li <% if $CurrentBool %>class="active"<% end_if %>>
                        <a href="$Link">$PageNum</a>
                    </li>
                <% else %>
                    <li>...</li>
                <% end_if %>
            <% end_loop %>
        </ul>
        
        <% if NotLastPage %>
            <ul class="next">
                <li><a href="$NextLink"><span></span></a></li>
            </ul>
        <% end_if %>
    </div>    
<% end_if %>