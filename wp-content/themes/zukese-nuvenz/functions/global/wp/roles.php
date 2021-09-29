<?php

// Verifica a role do usuário
function is_user_in_role($user_id, $role) {
  $user = get_userdata( $user_id );
  $roles = $user->roles;
  return in_array($role, (array) $user->roles);
}
