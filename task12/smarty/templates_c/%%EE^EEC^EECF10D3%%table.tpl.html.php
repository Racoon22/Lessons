<?php /* Smarty version 2.6.30, created on 2017-04-14 12:36:03
         compiled from table.tpl.html */ ?>
<h2 class="sub-header">Все объявления</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#id</th>
                  <th>Название</th>
                  <th>Описание</th>
                  <th>Действия</th>
                </tr>
              </thead>
              <tbody>
                 <?php echo $this->_tpl_vars['ads_rows']; ?>

              
              </tbody>
            </table>
          </div>