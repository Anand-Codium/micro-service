<?php

namespace CodiumTech\PincodeManager\Models;

use Illuminate\Database\Eloquent\Model;

class PincodeModel extends Model
{
    protected $table = 'master_pincode';
    protected $primaryKey = 'id';

    /**
     * Get the list of pincodes based on the search criteria.
     * @author Anand H
     * @date 2025-04-27
     * @param string|null $searchedPincode The pincode to search for (optional).
     */
    public function getPincode($searchedPincode = null)
    {
        if ($searchedPincode) {
            return self::where('pincode', 'like', $searchedPincode . '%')->where($this->activeCondition())
                ->orderBy('pincode')->limit(10)->get() ?? [];
        }
        return self::orderBy('pincode')->where($this->activeCondition())->limit(10)->get() ?? [];
    }

    /**
     * Get the active condition for the model.
     * @author Anand H
     * @date 2025-04-27
     * @return array The active condition for the model.
     */
    private function activeCondition()
    {
        return ['is_active' => 1, 'is_deleted' => 0];
    }
}
