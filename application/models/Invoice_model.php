<?php 
class Invoice_model extends CI_Model {

  /* Function name: getClients
     Use: Fetch clients from database
     Tablename: Clients */

  function getClients()
  {
        $this->db->select("*");
        $this->db->from("clients");
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
           return $query->result_array();      
        }
        return '';
  }

  /* Function name: getProductByClientID
     Use: Fetch products by client id from database
     Tablename: products */

  function getProductByClientID($clientId)
  {
        $this->db->select("*");
        $this->db->from("products");
        $this->db->where("client_id",$clientId);
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            return $query->result_array();    
        }
        else{
            return '';    
        }
  }

  /* Function name: getInvoiceData
     Use: Get invoice data from invoices and invoicelineitems table
     get  product data from products table
  */

   function getInvoiceData($clientId,$productId,$date)
   {
        $startdate = '';
        $enddate = '';
        if($date==1)
        {
          $startdate = date("Y-m-d", strtotime("first day of previous month"));   
          $enddate = date("Y-m-d");     
        }else if($date==2)
        {

          $startdate = date("Y-m-d", strtotime(date('Y-m-01'))); 
          $enddate = date("Y-m-d",strtotime(date('Y-m-t')));     
        }else if($date==3)
        {
          $startdate =  date('Y-m-d', strtotime('first day of this year'))  ;
          $enddate =    date('Y-m-d', strtotime('Dec 31'));     
        }else if($date==4)
        {
          $startdate =  date("Y-m-d",strtotime("last year January 1st"));
          $enddate = date("Y-m-d",strtotime("last year December 31st"));     
        }


        $this->db->select("*");
        $this->db->from("invoices");
        $this->db->join("invoicelineitems",'invoices.invoice_num=invoicelineitems.invoice_num');
         $this->db->join("products",'products.product_id=invoicelineitems.product_id');
        $this->db->where("invoicelineitems.product_id",$productId);
        $where = " invoice_date>='".$startdate."' and invoice_date<='".$enddate."' ";
        $this->db->where($where);

        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            return $query->result_array();    
        }
        else{
            return '';    
        }
   }
}
?>