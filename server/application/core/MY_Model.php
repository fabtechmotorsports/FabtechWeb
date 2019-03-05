<?php \defined('BASEPATH') || exit('Direct Script Access Denied');

/**
 * A base model class that holds our most commonly used functionality for data
 * extraction, data manipulation and data entry. These methods can be called
 * from any class that loads a database model.
 *
 * NOTE: A data model MUST exist and extend `MY_Model` to inherit this model
 * libraries features. `MY_Model` CANNOT be called and/or instantiated
 * directly.
 *
 * @package  FabtechApi
 * @author   Jason Napolitano <jnapolitanoit@fabtechmotorsports.com>
 * @license  2-clause BSD
 *
 * NOTE:     This class was completely revised as of February 5th, 2019
 *
 * @link     https://opensource.org/licenses/BSD-2-Clause
 * @link     https://www.codeigniter.com/user_guide/general/core_classes.html
 */
class MY_Model extends CI_Model
{

    /**
     * The bins database connection
     *
     * @var \CI_DB $sqlsrv_bins_db
     */
    public $sqlsrv_bins_db;

    /**
     * The default BinQty table
     *
     * @var string
     */
    public $bin_qty_table = 'Bins.dbo.BinQty';

    /**
     * The default BinTrans table
     *
     * @var string
     */
    public $bin_trans_table = 'Bins.dbo.BinTrans';

    /**
     * The Database's Primary DBO
     *
     * @var string $_p_dbo
     */
    protected $_p_dbo = 'Fabtechm';

    /**
     * The primary database table name for the model
     *
     * @var string $_table
     */
    protected $_table = 'SFDTLFIL_SQL';

    /**
     * The secondary database table name for the model
     *
     * @var string $_table2
     */
    protected $_table2 = null;

    /**
     * The third database table name for the model
     *
     * @var string $_table3
     */
    protected $_table3 = null;

    /**
     * The fourth and final database table name for
     * the model
     *
     * @var string $_table4
     */
    protected $_table4 = null;

    /**
     * The database tables primary key
     *
     * @var string $_pkey
     */
    protected $_pkey = 'pkey';

    /**
     * The way we'd like to return the data
     *
     * @var string $return_type
     */
    protected $return_type = 'array';

    /**
     * An empty array for WHERE clauses
     *
     * @var array $where
     */
    protected $where;

    /**
     * An empty array for WHERE xxx IN yyy clauses
     *
     * @var array $_where_in
     */
    protected $_where_in;

    /**
     * An empty ORDER BY string
     *
     * @var string $order_by
     */
    protected $order_by = '';

    // ------------------------------------------------------------------------

    /**
     * MY_Model constructor.
     */
    public function __construct()
    {
        // CI_Model Constructor
        parent::__construct();

        // Load the database library
        $this->load->database();

        // Load the Bins Database
        $this->sqlsrv_bins_db = $this->load->database('sqlsrv_bins_db', true);
    }

    // ------------------------------------------------------------------------

    /**
     * Pass an order number as a parameter and get an item number in return
     *
     * @param  string $order_no The order number to pass through to get an item
     *                          number returned
     *
     * @return array|bool|string
     */
    public function get_item_no_by_order_no($order_no = null)
    {
        // Let's build the query!
        $this->db
            ->select("SFDTLFIL_SQL.item_no")
            ->from("{$this->_p_dbo}.dbo.SFDTLFIL_SQL SFDTLFIL_SQL")
            ->where("ord_no = 00{$order_no}");

        // Let's get the queries data
        $query = $this->db->get();

        // Return the results if the qty is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Pass an order number as a parameter and get an order quantity in return
     *
     * @param  string $order_no The order number to pass through to get an item
     *                          number returned
     *
     * @return array|bool|string
     */
    public function get_order_qty_by_order_no($order_no = null)
    {
        // Let's build the query!
        $this->db
            ->select("SFORDFIL_SQL.ord_qty")
            ->from("{$this->_p_dbo}.dbo.SFORDFIL_SQL SFORDFIL_SQL")
            ->where("ord_no = 00{$order_no}");

        // Let's get the queries data
        $query = $this->db->get();

        // Return the results if the qty is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Pass an order number as a parameter and get an operation in return
     *
     * @param  string $order_no The order number to pass through to get an item
     *                          number returned
     *
     * @return array|bool|string
     */
    public function get_operation_by_order_no($order_no = null)
    {

        // Let's build the query!
        $this->db
            ->select("SFDTLFIL_SQL.oper_no")
            ->from("{$this->_p_dbo}.dbo.SFDTLFIL_SQL SFDTLFIL_SQL")
            ->where("ord_no = 00{$order_no}");

        // Let's get the queries data
        $query = $this->db->get();

        // Return the results if the qty is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Pass a UPC Code as a parameter and get an item number in return
     *
     * @param  string $upc_code The UPC Code to pass through to get an item number
     *
     * @return array|bool|string
     */
    public function get_item_no_by_upc_code($upc_code)
    {
        // Let's build the query!
        $this->db
            ->select("IMITMIDX_SQL.item_no")
            ->from("{$this->_p_dbo}.dbo.IMITMIDX_SQL IMITMIDX_SQL")
            ->where("upc_cd = 00{$upc_code}");

        // Let's get the queries data
        $query = $this->db->get();

        // Return the results if the qty is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Pass a item number as a parameter and get an UPC Code in return
     *
     * @param  string $item_no The item number to pass through to get a UPC Code
     *
     * @return array|bool|string
     */
    public function get_upc_code_by_item_no($item_no = null)
    {
        // Let's build the query!
        $this->db
            ->select("IMITMIDX_SQL.upc_cd")
            ->from("{$this->_p_dbo}.dbo.IMITMIDX_SQL IMITMIDX_SQL")
            ->where("item_no = 00{$item_no}");

        // Let's get the queries data
        $query = $this->db->get();

        // Return the results if the qty is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Get and array of affiliated order number objects by passing an item number
     * through
     *
     * @param  string $item_no The item number to pass through to get order numbers
     *
     * @return array|bool|string
     */
    public function get_order_nos_by_item_no($item_no = null)
    {
        // Let's build the query!
        $this->db
            ->select("SFORDFIL_SQL.ord_no")
            ->from("{$this->_p_dbo}.dbo.SFORDFIL_SQL SFORDFIL_SQL")
            ->where("item_no = '{$item_no}'");

        // Let's get the queries data
        $query = $this->db->get();

        // Return the results if the qty is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Get bin information by passing an item number through
     *
     * @param $item_no
     *
     * @return array|bool|string
     */
    public function get_bin_info_by_item_no($item_no)
    {
        $this->db
            ->select('*')
            ->from('Bins.db.BinQty BinQty')
            ->where('item_no', $item_no);

        // Let's get the queries data
        $query = $this->db->get();

        // Return the results if the qty is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * This simple function runs a query based off of two parameters, an order
     * number and the order status to check against. If the order number has a
     * status matching the parameter true is returned
     *
     * @param  string $order_no Order number for the query
     * @param  string $status   The status to check against
     *
     * @return bool
     */
    public function check_order_status($order_no, $status)
    {
        // Let's build the query!
        $this->db->select(' ord_no, item_no ')
            ->from("
                {$this->_p_dbo}.dbo.SFORDFIL_SQL SFORDFIL_SQL")
            ->where("
                ord_no = '00{$order_no}'")
            ->where('
                ord_status', $status);

        // Let's get the queries data
        $query = $this->db->get();

        // If the order has a matching status return true
        return $query->num_rows() > 0;
    }

    // ------------------------------------------------------------------------

    /**
     * Search the BinQty DBO for an items bin information using an order number
     * through
     *
     * @param  string $order_no Order number for the query
     *
     * @return mixed
     */
    public function search_bin_by_ord_no($order_no)
    {// Get an item number based off of the order number
        $item_no = $this->get_item_no_by_order_no($order_no);

        // Use the Query Builder class for properly formatted queries.
        $this->db
            ->select()
            ->from("{$this->_p_dbo}.dbo.SFORDFIL_SQL SFORDFIL_SQL")
            ->where("item_no = '{$item_no['item_no']}'");

        // Get the Database $search-term results
        $query = $this->db->get();

        // IF the number of rows returned is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Get an on-hand quantity using an item number as an argument
     *
     * @param  mixed $item_no The item number for the query
     *
     * @return array|bool|string
     */
    public function get_on_hand_qty($item_no)
    {
        // Assign the database table
        $this->_table = 'IMINVLOC_SQL';

        // Build the query
        $this->db
            ->select("
                {$this->_table}.item_no,
                {$this->_table}.qty_on_hand,
                {$this->_table}.loc,
                {$this->_table}.picking_seq")
            ->from("
                {$this->_p_dbo}.dbo.{$this->_table} {$this->_table}")
            ->where("
                {$this->_table}.loc='01'")
            ->where("
                {$this->_table}.item_no = '$item_no'");

        // Conduct the query
        $query = $this->db->get();

        // IF the number of rows returned is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return trim_array($query->row_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Search the BinQty DBO for an items bin information using an item number
     *
     * @param  string $item_no Item number for the query
     *
     * @return mixed
     */
    public function search_bin_by_item_no($item_no)
    {
        // Build the query
        $this->db
            ->select('')
            ->from("{$this->bin_qty_table} BinQty")
            ->where("item_no = '{$item_no}'");

        // Get the Database $search-term results
        $query = $this->db->get();

        // IF the number of rows returned is greater than 0
        if ($query->num_rows() > 0) {

            // Return the result
            return \trim_array($query->result_array());
        }

        // Otherwise, return FALSE
        return false;
    }

    // ------------------------------------------------------------------------

    /**
     * Conduct an update on BinsQty table
     *
     * @param array $set   The data for the query as a multi-dimensional array
     * @param array $where
     */
    public function update_bins_qty($set, $where)
    {
        // Build the query
        $this->sqlsrv_bins_db->update(
            $this->bin_qty_table, $set, $where
        );
    }

    // ------------------------------------------------------------------------

    /**
     * Create a new record in the BinsQty table
     *
     * @param mixed $set_data The data for the query as a multi-dimensional array
     *                        containing [item_no, BinNumber, Qty]
     */
    public function post_to_bins_qty($set_data)
    {
        // Build the query
        $this->sqlsrv_bins_db->insert(
            $this->bin_qty_table, $set_data
        );
    }

    // ------------------------------------------------------------------------

    /**
     * POST into the bin transaction table
     *
     * @param array $set_data
     */
    public function post_to_bin_trans($set_data)
    {
        // Build the query
        $this->db->insert(
            $this->bin_trans_table, $set_data
        );
    }

    // ------------------------------------------------------------------------

    /**
     * Remove the TRUE flag from the UDF5 field
     *
     * @param string $ord_no The order number for the query
     */
    public function add_true_flag($ord_no)
    {
        // Build the query
        $this->db->update(
            "{$this->_p_dbo}.dbo.SFDTLFIL_SQL", [
                'user_def_fld_5' => 'TRUE'
            ], [
                'order_no'       => $ord_no,
                'user_def_fld_5' => null,
            ]
        );
    }

    // ------------------------------------------------------------------------

    /**
     * Find all orders marked where the UDF5 !== NULL
     *
     * @param  string $order_no Order number for the query
     *
     * @return array|bool
     */
    public function get_true_flag($order_no)
    {
        // Build the query
        $this->db
            ->select('ord_no')
            ->select('item_no')
            ->from("{$this->_p_dbo}.dbo.SFDTLFIL_SQL SFDTLFIL_SQL")
            ->where("ord_no = {$order_no}")
            ->where(['user_def_fld_5 <> ' => null]);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return trim_array($query->row_array());
        } else {
            return false;
        }
    }

    // ------------------------------------------------------------------------

    /**
     * Remove the TRUE flag from the udf_5 field
     *
     * @param string $ord_no The order number for the query
     */
    public function remove_udf5_true_flag($ord_no)
    {
        // Build the query
        $this->db->update(
            "{$this->_p_dbo}.dbo.SFDTLFIL_SQL", [
                'user_def_fld_5' => null
            ], [
                'order_no'       => $ord_no,
                'user_def_fld_5' => 'TRUE',
            ]
        );
    }

    // ------------------------------------------------------------------------

    /**
     * Search the POORDHDR_SQL and the POORDLIN_SQL tables for PO Order data
     *
     * @param  mixed  $po_number The PO number to use as a lookup value
     *
     * @return array|bool
     */
    public function po_results($po_number)
    {// Build the query
        $this->db
            ->select("POORDHDR_SQL.*")
            ->select("POORDLIN_SQL.*")
            ->from("{$this->_p_dbo}.dbo.POORDHDR_SQL POORDHDR_SQL")
            ->from("{$this->_p_dbo}.dbo.POORDLIN_SQL POORDLIN_SQL")
            ->where("POORDHDR_SQL.ord_no = POORDLIN_SQL.ord_no")
            ->where("POORDHDR_SQL.ord_no='0{$po_number}00'")
            ->order_by('line_no');

        // Conduct the query
        $query = $this->db->get();

        // Return the data if the result set is greater than one row
        if ($query->num_rows() > 0) {
            return trim_array($query->result_array());

        // Return false otherwise
        } else {
            return false;
        }
    }

    // ------------------------------------------------------------------------

    /**
     * A POP Order lookup with a BOM
     *
     * @param  $ord_no The order number to search using
     *
     * @return array|bool
     */
    public function pop_with_bom($ord_no)
    {
        // Assigning the table data
        $this->_table    = 'PPORDFIL_SQL';
        $this->_table2   = 'BMPRDSTR_SQL';
        $this->_where_in = ['I', 'p'];
        $this->order_by  = "{$this->_table2}.comp_item_no";

        // Build the query
        $this->db
            ->select("
                {$this->_table}.item_desc_1,
                {$this->_table}.item_desc_2,
                {$this->_table}.item_no,
                {$this->_table}.ord_qty,
                {$this->_table}.item_no,
                {$this->_table}.ord_no,")
            ->select("*")
            ->from("
                {$this->_p_dbo}.dbo.{$this->_table} {$this->_table}")
            ->from("
                {$this->_p_dbo}.dbo.{$this->_table2} {$this->_table2}")
            ->where("
                {$this->_table2}.item_no = {$this->_table}.item_no")
            ->where("
                {$this->_table}.ord_no = {$ord_no}")
            ->where_in("
                {$this->_table}.ord_status", $this->_where_in);

        // Conduct the query
        $query = $this->db->get();

        // Return if the result set is greater than one row
        if ($query->num_rows() > 0) {
            // The trimmed result array
            return trim_array($query->result_array());

        // Return false otherwise
        } else {
            return false;
        }

    }

    // ------------------------------------------------------------------------

    /**
     * POP Order BOM Description
     *
     * @param $comp_item_no
     *
     * @return array|bool|string
     */
    public function pop_order_bom_desc($comp_item_no)
    {
        // Build the query
        $this->db->select("
            IMITMIDX_SQL.search_desc,
            IMITMIDX_SQL.item_desc_1,
            IMITMIDX_SQL.item_desc_2,
        ")
        ->from("
            {$this->_p_dbo}.dbo.IMITMIDX_SQL IMITMIDX_SQL
        ")
        ->where("
            IMITMIDX_SQL.item_no = '{$comp_item_no}'
        ");

        // Conduct the query
        $query = $this->db->get();

        // Return if the result set is greater than one row
        if ($query->num_rows() > 0) {
            // The trimmed result array
            return trim_array($query->row_array());

        // Return false otherwise
        } else {
            return false;
        }
    }

    // ------------------------------------------------------------------------

    /**
     * Update `HZNOTFIL_SQL` with the colors passed into a multi-dimensional
     * array
     *
     * @param array  $data       An associative array of update values
     * @param string $where      The where key
     * @param int    $batch_size Number of rows affected or FALSE on failure
     */
    public function update_colors(array $data, $where = null, $batch_size = 100)
    {
        $this->db->update_batch("
           {$this->_p_dbo}.dbo.HZNOTFIL_SQL HZNOTFIL_SQL, $data, $where, $batch_size
        ");
    }

    // ------------------------------------------------------------------------

    /**
     * Gets all fields data from SFDTLFIL_SQL and returns the data as an
     * array per order number passed through
     *
     * @param $order_no
     *
     * @return array|bool
     */
    public function op_shop_order_data($order_no)
    {
        $this->db
            ->select()
            ->from("{$this->_p_dbo}.dbo.SFDTLFIL_SQL SFDTLFIL_SQL")
            ->where("ord_no = 00{$order_no}")
            ->where('wc', 'OP')
            ->where('po_ord_no !< \'0\'')
            ->where('vend_no <> \'IND1\'')
            ->order_by('oper_no', 'ASC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return trim_array($query->result_array());
        } else {
            return false;
        }
    }

    // ------------------------------------------------------------------------

    /**
     * Gets all fields data from SFDTLFIL_SQL and returns the data as an
     * array per order number passed through
     *
     * @param $order_no
     *
     * @return array|bool
     */
    public function op_label_data($order_no)
    {
        $this->db->select('sfd_desc_1, item_no, ord_no, qty')
            ->from("{$this->_p_dbo}.dbo.SFDTLFIL_SQL SFDTLFIL_SQL")
            ->where("ord_no = 00{$order_no}")
            ->where('wc', 'OP')
            ->where('po_ord_no !< \'0\'')
            ->where('vend_no <> \'IND1\'')
            ->order_by('oper_no', 'ASC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return trim_array($query->result_array());
        } else {
            return false;
        }
    }

    // ------------------------------------------------------------------------
}
