$(function() {
  'use strict';

  $('#table').on('click', '.delete_recipe', function() {
    if (!confirm('本当に削除しますか?')) {
      return false;
    } else {
      location.href='index.php';
    }
  });
});
