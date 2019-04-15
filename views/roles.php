  <?php 
  require("classes/users.class.php");
  $users = new Users();
  $roles = $users->getRoles();
  $pages = $users->getPages();
  

  ?>
  <script>
  $(document).ready(function() {

    $.ajax({
        type: "POST",
        url: "classes/service.php",
        data: { 
            task: "getRolesPages" 
        }
    }).done(function(data){
        var data = JSON.parse(data);
        console.log(data);
        for(i=0; i<data.length;i++) {
          console.log(data[i]);    
          $('#r'+data[i].id_rol+"p"+data[i].id_page)[0].checked = true;
        }
    })

    $(".rolesChecker").on('change', function(){ // on change of state
      if(this.checked){
        var value='checked';
      } else {    
        var value='unchecked';
      }

        var idCheckBox = $(this).attr("id")
        var check = idCheckBox.split("p");
        var rol = check[0].substring(1);
        var page = check[1];

        //alert("rol "+rol+" page "+page+" valor "+value);
  
        $.ajax({
            type: "POST",
            url: "classes/service.php",
            data: { 
              rol: rol,
              page: page,
              value: value,
              task: "setRol" 
            }
        }).done(function(data){
              
        })

    })
  });
  
  </script>

  <!-- Page -->
  <div class="page animsition">
    <div class="page-header">
      <h1 class="page-title">Usuarios</h1>
      <div class="page-header-actions"></div>
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">
            Listado de usuarios
          </h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>  
                <center>Páginas</center>
                </th>
                <?php 
                $_roles = array();
                foreach ($roles as $rol) { 
                ?>
                  <th>
                    <center>
                      <?php 
                        echo ucfirst($rol['name']);
                        array_push($_roles, $rol['id']);
                      ?>
                    </center>
                  </th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              
            <?php 
            $i=0;
            $num_pages = count($roles);
            foreach ($pages as $page){ ?>
              <tr>
                <td>
                  <center>
                    <?php echo $page['menu_title'];?>
                  </center>
                </td>
                <?php for ($j=0; $j<$num_pages; $j++) { ?>
                  <td>
                    <center>
                      <input class="rolesChecker" id="r<?php echo $_roles[$j];?>p<?php echo $page['id']?>" type="checkbox" rol="<?php echo $_roles[$j];?>" page="<?php echo $page['id']?>">
                    </center>
                  </td>
                <?php } ?>

              </tr>
              <?php 
              $i++;
              } ?>
              
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->

      
        </div>
      </div>
      <!-- End Panel FixedHeader -->
    </div>
  </div>
  <!-- End Page -->


