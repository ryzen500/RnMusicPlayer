<?php
require_once "../config.php";
   if(function_exists($_GET['function'])) {
         $_GET['function']();
      }   
   function getMusic()
   {
      global $con;      
      $query = $con->query("SELECT * FROM songs");            
      while($row=mysqli_fetch_object($query))
      {
         $data[] =$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }   
   
   function getMusicId()
   {
      global $con;
      if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }            
      $query ="SELECT * FROM songs WHERE id= $id";      
      $result = $con->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data)
      {
      $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
       
   }
   function masukanMusic()
      {
         global $con;   
         $check = array('id' => '', 'title' => '', 'artist' => '', 'album' => '','genre'=> '','duration'=> '','path' => '', 'albumOrder'=> '','plays' => '');
         $check_match = count(array_intersect_key($_POST, $check));
         if($check_match == count($check)){
         
               $result = mysqli_query($con, "INSERT INTO songs SET
               id = '$_POST[id]',
               title = '$_POST[title]',
               artist = '$_POST[artist]',
               album = '$_POST[album]',
               genre ='$_POST[genre]',
               duration ='$_POST[duration]',
               path = '$_POST[path]',
               albumOrder = '$_POST[albumOrder]',
               plays = '$_POST[plays]'
               ");
               
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Insert Success'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Insert Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
   function updateMusic()
      {
         global $con;
         if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }   
         $check = array('nama' => '', 'jenis_kelamin' => '', 'alamat' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
              $result = mysqli_query($con, "UPDATE karyawan SET               
               nama = '$_POST[nama]',
               jenis_kelamin = '$_POST[jenis_kelamin]',
               alamat = '$_POST[alamat]' WHERE id = $id");
         
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Update Success'                  
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Update Failed'                  
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter',
                     'data'=> $id
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
   function hapusMusic()
   {
      global $con;
      $id = $_GET['id'];
      $query = "DELETE FROM songs WHERE id=".$id;
      if(mysqli_query($con, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Delete Success'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Delete Fail.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 ?>