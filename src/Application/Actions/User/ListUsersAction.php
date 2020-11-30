<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class ListUsersAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
    	$params = $this->request->getQueryParams();
    	if (key_exists('username', $params)) {
    		$username = $params['username'];
		    $users = $this->userRepository->findUserByUsername($username);
		    $this->logger->info("Attempted to view User with username of `${username}` was viewed.");
	    }
    	else {
		    $users = $this->userRepository->findAll();
		    $this->logger->info("Users list was viewed.");
	    }


        return $this->respondWithData($users, $this->response->getStatusCode());
    }
}
