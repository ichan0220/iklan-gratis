<script type="text/javascript">
    $(function() {
        $('#add_field').click(function(evt) {
            
            $('#field_grid tr:last').clone().appendTo('#field_grid tbody');
            
            $('#field_grid').find("tr:nth-child(odd)").removeClass('even').removeClass('odd').addClass("odd");
            $('#field_grid').find("tr:nth-child(even)").removeClass('even').removeClass('odd').addClass("even");
        
            return evt.preventDefault(); 
        });
        
        $('.the-content .estimate-delete').live('click', function(evt) {
            evt.preventDefault();
            
            var tr = $(this).parents('tr');
            tr.remove();
            return false;
        });

        $('#attachment-add').click(function(evt) {
            var a = $('#attachment-proto').clone().append('<a href="#" class="attachment-delete">( hapus )</a>');
            $('#attachment-placeholder').append(a);
            return evt.preventDefault();
        });
        
    });
</script>

<style type="text/css">
    .table {
        width: 83%!important;
        border: 1px solid;
        margin-left: 0px!important;
    }
    .table2 {
        width: 83%!important;
        margin-left: 0px!important;
    }
    .input {width: 95%}
</style>





<?php $title = l((empty($id) ? 'Add %s' : 'Edit %s'), array(l(humanize(get_class($CI))))) ?>
<script type="text/javascript" src="<?php echo theme_url('js/ckeditor/ckeditor.js') ?>"></script>

<?php
echo $this->admin_panel->breadcrumb(array(
    array('uri' => $CI->_get_uri('listing'), 'title' => l(humanize(get_class($CI)))),
    array('uri' => $CI->uri->uri_string, 'title' => $title),
))
?>

<div class="clearfix"></div>

<form action="<?php echo current_url() ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?php echo $title ?></legend>
        <div>
            <label><?php echo l('Tipe Iklan') ?></label>
            <?php echo xform_lookup('type_iklan') ?>
        </div>
        <div>
            <label><?php echo l('Kategori') ?></label>
            <?php echo xform_lookup('kategori') ?>
        </div>
        <div>
            <label><?php echo l('Harga (Rp)') ?></label>
             <input type="text" name="harga" value="<?php echo set_value('harga') ?>" style="width: 200px" />
             <table>
                 <tr>
                     <td><input type="checkbox" name="nego" value="Nego" />Nego</td>
                     <td><input type="checkbox" name="call" value="Call" />Call</td>
                 </tr>
             </table>
        </div>
        <div>
            <label><?php echo l('Kondisi') ?></label>
                <select name="kondisi">
                    <option>Select</option>
                    <option value="Baru">Baru</option>
                    <option value="Bekas">Bekas</option>
                </select>
        </div>
        <div>
            <label><?php echo l('Title') ?></label>
             <input type="text" name="title" value="<?php echo set_value('title') ?>" />
        </div>
        <div id="living">
            <label><?php echo l('Description') ?></label>
            <div>
                <textarea class="ckeditor" name="description" placeholder="description"><?php echo set_value('description') ?></textarea>
            </div>
        </div>
        <div id="gallery"></div>
        <fieldset>
            <legend>Upload Image</legend>
            <div>
                <table id="field_grid" class="table table-bordered" style="width: 100%"> 
                    <tr >
                        <td>Image</td>
                        <td><input type="file" name="image[]" /></td>
                    </tr>
                </table>
            </div>
            <div style="float: right">
                <a href="#" class="button" id="add_field"><?php echo l('Add Field') ?></a>
            </div>
            <br/>
        </fieldset>
        <?php if(!empty($id)): ?>
            <?php echo $this->grid_image_attachment->show($file_image); ?>
        <?php else: ?>
            <?php echo ""; ?>
        <?php endif; ?>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>