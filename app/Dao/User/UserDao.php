<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserDao implements UserDaoInterface
{
  //return messages
  const SUCCESS_USER_CREATE = 'A user is added successfully.';
  const FAIL_IMAGE_UPLOAD = 'Your uploaded file is not image.';
  const SUCCESS_USER_UPDATE = 'A user is updated successfully.';
  const SUCCESS_USER_DELETE = 'A User is deleted successfully.';
  const SUCCESS_USER_PASSWORD = 'Your password is updated successfully.';
  const FAIL_USER_PASSWORD = 'Your old password is does not match.';
  const SUCCESS_POST_CREATE = ' post is created successfully.';
  const SUCCESS_POST_UPDATE = ' is updated successfully.';
  const SUCCESS_POST_DELETE = 'A post is deleted successfully.';

  //return views
  const USER_LISTS = 'user.user.user-lists';
  const CREATE_USER = 'user.user.create-user';
  const USER_VIEW = 'user.user.user';
  const USER_EDIT = 'user.user.update-user';
  const USER_CHANGE_PASSWORD = 'user.user.change-password';
  const USER_SEARCH_RESULT = 'user.user.user-lists';
  const POST_LISTS_VIEW = 'user.post.post-lists';
  const CREATE_POST = 'user.post.create-post';
  const POST_EDIT = 'user.post.update-post';

  //redirect routes
  const POST_LISTS = 'user/post/post-lists';
  const POST_UPDATE_REDIRECT = '/user/post/update-post/';

  //common variables
  const STATUS = 'status';
  const USE_NULL = '';

  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */

  //user list action
  public function getUserList()
  {
    $users = User::orderBy('created_at', 'desc')->where('deleted_at',null)
    ->paginate(10);
    $type = Auth::user()->type;
    if($type==0){
      return view(self::USER_LISTS,compact('users'));
    }else{
      return redirect(self::POST_LISTS);
    }
  }

}
