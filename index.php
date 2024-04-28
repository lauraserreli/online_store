<?php
require_once 'template/header.php';
require_once 'src/common.php';
?>

        <h3 class="text-muted">Home page</h3>
        </div>

        <div class="mainarea">
            <?php
                $results = read_products();

                if (count($results) > 0) {
            ?>

                    <h2><?php echo count($results); ?> products to display:</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <?php
                                if(isset($_SESSION['Active'])){
                                    echo "<th>Action</th>";
                                }
                            ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $row) { ?>
                            <tr>
                                <td><?php echo $row["idproduct"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td><img height="100px" width="100px" src="<?php echo $row["image"]; ?>"></td>
                                <?php
                                if(isset($_SESSION['Active'])){
                                    echo "<td><a href=\"buy.php?idproduct=".$row["idproduct"]."\">Buy product</a></td>";
                                }
                                ?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

            <?php
                } else {
                    echo "No products to display.";
                }
            ?>
        </div>

      <div class="row marketing">
        <div>
          <h4>Project Note:</h4>
          <p>All the images have been taken from Google using the specific search with Creative Commons licenses</p>

       </div>

          <?php require_once 'template/footer.php';?>
