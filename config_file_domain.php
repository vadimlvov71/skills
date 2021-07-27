foreach($companies as $company){
				 $path_to_config_site = '../config_sites/'.$company["dbs"].'/config.php';
					if (file_exists($path_to_config_site)) {
						$result1 = file($path_to_config_site);
						if(preg_match($pattern, $result1[1])){
						$res_index = $result1[1];
						//echo "empty";
						}else{
							$res_index = $result1[2];
							//echo "full";
						}
						$res_index = trim($res_index);
						preg_match($pattern, $res_index, $matches);
						$site_name_original = "";
						if(isset($matches[1])){
							$http_arr = explode("://", $matches[1]);
							$temp_arr = explode(".", $http_arr[1]);
							$dbs = $company["dbs"];
							if($temp_arr[0] == "www"){
								
								$domain_arr[$dbs] = $temp_arr[1];
							}else{
								$domain_arr[$dbs] = $temp_arr[0];
							}
							//echo "domain::: <span style='background:red'>".$domain."</span><br>";
							$site_name_original = "<span style='color:green'>".$matches[1].$company["dbs"]."</span>";
							$color = "green";
						}else{
							//$site_name_original = $company["dbs"];
							$site_name_original = "<span style='background:yellow'>config file without a domain</span>";
						}
					}else{
						$site_name_original = "<span style='background:red'>the config file doesnt exist</span>";
						$color = "red";
					}
				?>
				<div class="nav-item ">
					<?php echo($company["site_name"])?>  ------    <?php echo($site_name_original)?>
				</div>
				<?php
			  }
			  ?>
