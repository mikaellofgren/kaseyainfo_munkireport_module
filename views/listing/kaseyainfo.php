<?$this->view('partials/head')?>

<? //Initialize models needed for the table
new Machine_model;
new Reportdata_model;
new kaseyainfo_model;
?>

<div class="container">

  <div class="row">
    <div class="col-lg-12">
    <script type="text/javascript">
    
    $(document).on('appUpdate', function(e){

        var oTable = $('.table').DataTable();
        oTable.ajax.reload();
        return;

    });


    $(document).on('appReady', function(e, lang) {

        // Get modifiers from data attribute
        var mySort = [], // Initial sort
            hideThese = [], // Hidden columns
            col = 0, // Column counter
            columnDefs = [{ visible: false, targets: hideThese }]; //Column Definitions

        $('.table th').map(function(){

            columnDefs.push({name: $(this).data('colname'), targets: col});

            if($(this).data('sort'))
            {
              mySort.push([col, $(this).data('sort')])
            }

            if($(this).data('hide'))
            {
              hideThese.push(col);
            }

            col++
        });

          oTable = $('.table').dataTable( {
              ajax: {
                  url: "<?php echo url('datatables/data'); ?>",
                  type: "POST"
              },
              dom: mr.dt.buttonDom,
              buttons: mr.dt.buttons,
              order: mySort,
              columnDefs: columnDefs,
              createdRow: function( nRow, aData, iDataIndex ) {
                // Update name in first column to link
                var name=$('td:eq(0)', nRow).html();
                if(name == ''){name = "No Name"};
                var sn=$('td:eq(1)', nRow).html();
                var link = get_client_detail_link(name, sn, '<?=url()?>/', '#tab_summary');
                $('td:eq(0)', nRow).html(link);

                
            }
          } );

          // Use hash as searchquery
          if(window.location.hash.substring(1))
          {
          oTable.fnFilter( decodeURIComponent(window.location.hash.substring(1)) );
          }

      } );
    </script>

      <h3>Kaseya  <span id="total-count" class='label label-primary'>…</span></h3>

      <table class="table table-striped table-condensed table-bordered">
        <thead>
          <tr>
              <th data-i18n="listing.computername" data-colname='machine.computer_name'></th>
              <th data-i18n="serial" data-colname='reportdata.serial_number'></th>
              <th data-i18n="listing.username" data-colname='reportdata.long_username'></th>
               <th data-i18n="kaseyainfo" data-colname='kaseyainfo.username'>Kaseya Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td colspan="5" class="dataTables_empty">Loading data from server</td>
        </tr>
        </tbody>
      </table>
    </div> <!-- /span 12 -->
  </div> <!-- /row -->
</div>  <!-- /container -->

<?php $this->view('partials/foot'); ?>
