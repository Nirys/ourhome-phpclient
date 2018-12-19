<?php

namespace OurHome;

use OurHome\Users\User;
use OurHome\Users\UserList;

/**
 * Class House
 * @package OurHome
 * @method string getAvgPointsThisPeriod()
 * @method void setAvgPointsThisPeriod($avgPointsThisPeriod)
 * @method string getCurrency()
 * @method void setCurrency($currency)
 * @method string getDeductWeeklyTarget()
 * @method void setDeductWeeklyTarget($deductWeeklyTarget)
 * @method string getFamilyName()
 * @method void setFamilyName($familyName)
 * @method string getHasPassword()
 * @method void setHasPassword($hasPassword)
 * @method string getId()
 * @method void setId($id)
 * @method string getNonAdminCanAddAdminUsers()
 * @method void setNonAdminCanAddAdminUsers($nonAdminCanAddAdminUsers)
 * @method string getNonAdminCanAddCategories()
 * @method void setNonAdminCanAddCategories($nonAdminCanAddCategories)
 * @method string getNonAdminCanAddRewards()
 * @method void setNonAdminCanAddRewards($nonAdminCanAddRewards)
 * @method string getNonAdminCanAddShoppingItems()
 * @method void setNonAdminCanAddShoppingItems($nonAdminCanAddShoppingItems)
 * @method string getNonAdminCanAddTasks()
 * @method void setNonAdminCanAddTasks($nonAdminCanAddTasks)
 * @method string getNonadminsCanAddUsers()
 * @method void setNonadminsCanAddUsers($nonadminsCanAddUsers)
 * @method string getNonadminsCanCompleteOthersTasks()
 * @method void setNonadminsCanCompleteOthersTasks($nonadminsCanCompleteOthersTasks)
 * @method string getNonadminsCanCompleteTasksForOthers()
 * @method void setNonadminsCanCompleteTasksForOthers($nonadminsCanCompleteTasksForOthers)
 * @method string getNonadminsCanCompleteTasksMultipleTimes()
 * @method void setNonadminsCanCompleteTasksMultipleTimes($nonadminsCanCompleteTasksMultipleTimes)
 * @method string getNonadminsCanDeleteCategories()
 * @method void setNonadminsCanDeleteCategories($nonadminsCanDeleteCategories)
 * @method string getNonadminsCanDeleteRewards()
 * @method void setNonadminsCanDeleteRewards($nonadminsCanDeleteRewards)
 * @method string getNonadminsCanDeleteShoppingItems()
 * @method void setNonadminsCanDeleteShoppingItems($nonadminsCanDeleteShoppingItems)
 * @method string getNonadminsCanDeleteTasks()
 * @method void setNonadminsCanDeleteTasks($nonadminsCanDeleteTasks)
 * @method string getNonadminsCanDeleteUsers()
 * @method void setNonadminsCanDeleteUsers($nonadminsCanDeleteUsers)
 * @method string getNonadminsCanEditCategories()
 * @method void setNonadminsCanEditCategories($nonadminsCanEditCategories)
 * @method string getNonadminsCanEditRewards()
 * @method void setNonadminsCanEditRewards($nonadminsCanEditRewards)
 * @method string getNonadminsCanEditShoppingItems()
 * @method void setNonadminsCanEditShoppingItems($nonadminsCanEditShoppingItems)
 * @method string getNonadminsCanEditTasks()
 * @method void setNonadminsCanEditTasks($nonadminsCanEditTasks)
 * @method string getNonadminsCanEditUsers()
 * @method void setNonadminsCanEditUsers($nonadminsCanEditUsers)
 * @method string getNonadminsCanSeeCompetitions()
 * @method void setNonadminsCanSeeCompetitions($nonadminsCanSeeCompetitions)
 * @method string getNonadminsCanSeeHouseFeedActivity()
 * @method void setNonadminsCanSeeHouseFeedActivity($nonadminsCanSeeHouseFeedActivity)
 * @method string getNonadminsCanSeeOtherUserPoints()
 * @method void setNonadminsCanSeeOtherUserPoints($nonadminsCanSeeOtherUserPoints)
 * @method string getNonadminsCanSeeOtherUserProfiles()
 * @method void setNonadminsCanSeeOtherUserProfiles($nonadminsCanSeeOtherUserProfiles)
 * @method string getNonadminsCanSeeOtherUserRewards()
 * @method void setNonadminsCanSeeOtherUserRewards($nonadminsCanSeeOtherUserRewards)
 * @method string getNonadminsCanSeeOtherUserTasks()
 * @method void setNonadminsCanSeeOtherUserTasks($nonadminsCanSeeOtherUserTasks)
 * @method string getPeriod()
 * @method void setPeriod($period)
 * @method string getPointsEnabled()
 * @method void setPointsEnabled($pointsEnabled)
 * @method string getResourceUri()
 * @method void setResourceUri($resourceUri)
 * @method string getTaskCompletionApproval()
 * @method void setTaskCompletionApproval($taskCompletionApproval)
 * @method string getTimezone()
 * @method void setTimezone($timezone)
 * @method UserList getUsers()
 * @method void setUsers(UserList $users)
 **/
class House extends AbstractEntity {
    protected $_attributes = array(
        '_avgPointsThisPeriod' => 'average_points_this_period',
        '_currency' => 'AUD',
        '_deductWeeklyTarget' => 'deduct_weekly_target',
        '_familyName' => 'family_name',
        '_hasPassword' => 'has_password',
        '_id' => 'id',
        '_nonAdminCanAddAdminUsers' => 'nonadmins_can_add_admin_users',
        '_nonAdminCanAddCategories' => 'nonadmins_can_add_categories',
        '_nonAdminCanAddRewards' => 'nonadmins_can_add_rewards',
        '_nonAdminCanAddShoppingItems' => 'nonadmins_can_add_shopping_items',
        '_nonAdminCanAddTasks' => 'nonadmins_can_add_tasks',
        "_nonadminsCanAddUsers" => "nonadmins_can_add_users",
        "_nonadminsCanCompleteOthersTasks" => "nonadmins_can_complete_others_tasks",
        "_nonadminsCanCompleteTasksForOthers" => "nonadmins_can_complete_tasks_for_others",
        "_nonadminsCanCompleteTasksMultipleTimes" => "nonadmins_can_complete_tasks_multiple_times",
        "_nonadminsCanDeleteCategories" => "nonadmins_can_delete_categories",
        "_nonadminsCanDeleteRewards" => "nonadmins_can_delete_rewards",
        "_nonadminsCanDeleteShoppingItems" => "nonadmins_can_delete_shopping_items",
        "_nonadminsCanDeleteTasks" => "nonadmins_can_delete_tasks",
        "_nonadminsCanDeleteUsers" => "nonadmins_can_delete_users",
        "_nonadminsCanEditCategories" => "nonadmins_can_edit_categories",
        "_nonadminsCanEditRewards" => "nonadmins_can_edit_rewards",
        "_nonadminsCanEditShoppingItems" => "nonadmins_can_edit_shopping_items",
        "_nonadminsCanEditTasks" => "nonadmins_can_edit_tasks",
        "_nonadminsCanEditUsers" => "nonadmins_can_edit_users",
        "_nonadminsCanSeeCompetitions" => "nonadmins_can_see_competitions",
        "_nonadminsCanSeeHouseFeedActivity" => "nonadmins_can_see_house_feed_activity",
        "_nonadminsCanSeeOtherUserPoints" => "nonadmins_can_see_other_user_points",
        "_nonadminsCanSeeOtherUserProfiles" => "nonadmins_can_see_other_user_profiles",
        "_nonadminsCanSeeOtherUserRewards" => "nonadmins_can_see_other_user_rewards",
        "_nonadminsCanSeeOtherUserTasks" => "nonadmins_can_see_other_user_tasks",
        "_period" => "period",
        "_pointsEnabled" => "points_enabled",
        "_resourceUri" => "resource_uri",
        "_taskCompletionApproval" => "task_completion_approval",
        "_timezone" => "timezone",
        '_users' => 'users'
    );

    /**
     * @param array $users
     * @return UserList
     */
    protected function _parseUsers($users){
        $collection = new UserList();
        if(is_array($users)){
            foreach($users as $user){
                $collection->append(new User($user, $this->_client));
            }
        }
        return $collection;
    }
}