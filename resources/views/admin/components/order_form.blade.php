<form action="{{route($module_name.'.set_order',$id)}}">
    <div class="input-group">
        <input type="number" min="0" name="item_order" class="form-control input-sm" value="{{$item_order}}" style="height: calc(1.4em + 1rem + 2px);">
        <span class="input-group-btn">
            <button type="button" class="btn btn-icon btn-bg-light btn-primary btn-sm me-1"
                    onclick="setOrder(this,event)"
                    data-rel="tooltip" data-placement="top" title="" data-original-title="حفظ"
                    data-loading-text="<i class='fa fa-spinner fa-spin'></i>">
                <i class="fa fa-save"></i>
            </button>
        </span>
    </div>
</form>
