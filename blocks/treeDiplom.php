<?php
if ($_SESSION['user']['role'] == 3 || $_SESSION['user']['role'] == 4) {
    echo "";
} else { ?>
    <div class="container p-4">
        <div class="treeview-container" style="display: flex;min-height: 50vh;">
            <div class="treeview border" style="width: 600px;">
                <h6 class="pt-3 pl-3">Архив дипломных работ</h6>
                <hr>
                <ul class="mb-1 pl-3 pb-2">
                    <?php
                    foreach ($result as $keys => $values) {
                        echo "<li><i class='fas fa-angle-right rotate'></i>";
                        echo "<span><i class='far fa-folder-open ic-w mx-1'></i>" . $keys . "</span>";
                        echo "<ul class='nested'>";
                        foreach ($values as $key => $value) {
                            echo "<li><i class='fas fa-angle-right rotate'></i>";
                            echo "<span><i class='far fa-folder-open ic-w mx-1'></i>" . $key . "</span>";
                            echo "<ul class='nested'>";
                            foreach ($value as $ke => $valu) {
                                echo "<li><i class='fas fa-angle-right rotate'></i>";
                                echo "<span><i class='far fa-folder-open ic-w mx-1'></i>" . $ke . "</span>";
                                echo "<ul class='nested'>";
                                foreach ($valu as $k => $v) {
                                    $user_id = $v['u_id'];
                                    echo "<li>
                                            <i class='fas fa-address-card mr-1'></i>
                                            <a onclick=getDiplomInfo($user_id)>" . $v['surname'] . " " . $v['name'] . " " . $v['midname'] . "</a>
                                        </li>";
                                }
                                echo "</ul></li>";
                            }
                            echo "</ul></li>";
                        }
                        echo "</ul></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="treeview-content border" style="width: 100%;">

            </div>
        </div>
    </div>
<?php   }
?>