<?php
/**
 * Created by PhpStorm.
 * User: orcun
 * Date: 25/09/16
 * Time: 00:52
 */

namespace WiggleDigital\MailChimp;

interface CRUDInterface {

    /**
     * @param array $data
     * @return array|string
     */
    public function create($data);

    /**
     * @return array|string
     */
    public function read();

    /**
     * @param array $data
     * @return array|string
     */
    public function update($data);

    /**
     * @return array|string
     */
    public function delete();
}