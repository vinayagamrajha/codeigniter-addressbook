<?php
class User_model extends CI_Model
{
    /**
     * This function is used to get all users
     * @return  array result
     */
    public function get_users()
    {
        $query = $this->db->get("users");
        return $query->result();
    }
    /**
     * This function is used to insert a user
     *
     * @param       array  $data_insert 
     * @return      string
     */
    public function insert_user($data_insert)
    {
        return $this->db->insert('users', $data_insert);
    }
    /**
     * This function is used to update a user
     *
     * @param    int  $id  array $data_update
     * @return   string
     */
    public function update_user($id, $data_update)
    {
        if ($id != 0) {
            $this->db->where('id', $id);
            return $this->db->update('users', $data_update);
        }
    }
    /**
     * This function is used to get the user by Id
     *
     * @param       int  $id
     * @return      user list
     */
    public function get_user_by_id($id)
    {
        $user = $this->db->get_where('users', array(
            'id' => $id
        ))->row();
        return $user;
    }
}
?>