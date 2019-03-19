<?php
    require 'inc/db.php';
    $output = '';
    if(isset($_POST["query"])){
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "SELECT * FROM searchs WHERE name LIKE '%".$search."%' OR email LIKE '%".$search."%' OR phone LIKE '%".$search."%' ";
    } else{
        $query = "SELECT * FROM searchs";
    }

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $output .= '
        <div class="card">
            <table class="table table-bordered table-responsive">
                <thead>                  
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>';
                while($row = mysqli_fetch_array($result)){
                $output .= '
                
                    <tr>
                        <td>'.$row["id"].'</td>
                        <td>'.$row["name"].'</td>
                        <td>'.$row["email"].'</td>
                        <td>'.$row["phone"].'</td>
                    </tr>';
                }//while end
                echo $output;
                echo '
                </tbody>
            </table>
        </div>';

    } else{
        echo 'Data Not Found';
    }

?>