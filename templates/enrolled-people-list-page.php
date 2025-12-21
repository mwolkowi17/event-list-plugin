 <h1 class="my-heading-1">List of people signed to Event</h1>
 <?php
    global $wpdb;
    $table_name = $wpdb->prefix . "event_list";
    $user = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
 <div class="page-container1">

     <table>
         <div class="naglowek-1">
             <tr>
                 <th>ID</th>
                 <th>NAME</th>
                 <th>EMAIL</th>
             </tr>
         </div>
         <?php foreach ($user as $row) { ?>
             <tr>
                 <td>
                     <div class="tabela-rzad"><?php echo $row->id ?></div>
                 </td>
                 <td>
                     <div class="tabela-rzad"><?php echo $row->user_name ?></div>
                 </td>
                 <td>
                     <div class="tabela-rzad"><?php echo $row->user_email ?></div>
                 </td>
             </tr>
         <?php } ?>
     </table>
     <p><?php echo "ilość osób zapisanych: " . count($user) ?></p>
 </div>

 <style>
     .my-heading-1 {
         text-align: center;
         margin-top: 50px;
         margin-bottom: 25px;
     }

     .page-container1 {
         padding: 20px;
     }

     .page-container1 table {
         width: 100%;
         border-collapse: collapse;
         font-size: 16px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
     }

     th {
         text-align: left !important;
         padding-left: 15px;

     }

     .naglowek-1 tr th {
         background-color: #0073aa;
         color: white;
         padding: 12px;
         text-align: left !important;
         font-weight: bold;
     }

     .page-container1 table tr td {
         padding: 10px;
         border-bottom: 1px solid #ddd;
     }

     .page-container1 table tr:hover {
         background-color: #f5f5f5;
     }

     .tabela-rzad {
         padding: 5px;
         word-break: break-word;
     }

     .page-container1 table tr:last-child td {
         border-bottom: 2px solid #0073aa;
     }
 </style>