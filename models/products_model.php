<?php

class Products_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }

    public function listProducts(){

    	return $this->db->listAll('product',array('product_id','product_name','product_description','is_featured','is_new'));
        
    }

    public function getProduct($id){

        return $this->db->listWhere('product',array('product_id','product_name','product_description','is_featured','is_new','category_id','price_category_id','is_published'),"product_id='$id'");
    }

    public function getAllDetails(){
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    public function getSizes(){
        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }
    public function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }
    public function getColors(){
        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }
    public function getCategories(){
        return $this->db->query("SELECT category.name
        FROM category ;");
    }
    public function getPriceCategories(){
        return $this->db->query("SELECT price_category.price_category_name
        FROM price_category ;");
    }




    public function create($data,$size){

        $this->db->insert('product',array(
            'product_id' => $data['product_id'],
            // 'sizes' => $data['sizes'],
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'is_featured' => $data['is_featured'],
            'is_new' => $data['is_new'],
            'is_published' => $data['is_published']

            

        ));
        $category=$data['category'];
        $product_id=$data['product_id'];
        $price_category=$data['price_category'];
        $colors=$data['colors'];
        $qty=$data['quantity'];
        $this->db->queryExecuteOnly("UPDATE product SET product.category_id=(SELECT category_id FROM category WHERE category.name='$category' ) WHERE product.product_id=$product_id ");
        $this->db->queryExecuteOnly("UPDATE product SET product.price_category_id=(SELECT price_category_id FROM price_category WHERE price_category.price_category_name='$price_category' ) WHERE product.product_id=$product_id ");
        $this->db->queryExecuteOnly("INSERT INTO inventory (product_id,qty) VALUES ($product_id,$qty)");
        foreach ($size as $sizes) {
            $s=$sizes;
            $this->db->queryExecuteOnly("INSERT INTO product_size (product_id,sizes) VALUES ($product_id,'$s')");
        }
        $col=explode(",",$colors);
        for ($x=0;$x<count($col);$x++) {
            $p=$col[$x];
            $this->db->queryExecuteOnly("INSERT INTO product_colors (product_id,colors) VALUES ($product_id,'$p')");
        }
    }
    public function myCreate($data){
        $this->db->query("INSERT INTO product (product_id) VALUES $data");
        // $this->db->queryExecute("INSERT INTO product (product_name) VALUES $data['product_name']");
        // $this->db->queryExecute("INSERT INTO product (product_description) VALUES $data['product_description']");
        // $this->db->queryExecute("INSERT INTO product (is_featured) VALUES $data['is_featured']");
        // $this->db->queryExecute("INSERT INTO product (is_new) VALUES $data['is_new']");
        // $this->db->queryExecute("INSERT INTO product (is_published) VALUES $data['is_published']");
    }

    // public function update($data){

    //     $this->db->update('user',array(
    //         'nic' => $data['nic'],
    //         'first_name' => $data['first_name'],
    //         'last_name' => $data['last_name'],
    //         'gender' => $data['gender'],
    //         'email' => $data['email'],
    //         'username' => $data['email'],
    //         'contact_no' => $data['contact_no'],
    //         'user_status' => $data['user_status'],
    //         'user_type' => $data['user_type']),"nic = '{$data['nic']}'");

    // }

    public function delete($id){
        
            
        $this->db->delete('product',"product_id='$id'");
        

    }




}