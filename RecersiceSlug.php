 public function checkIfExist($slug, $i)
    {
        $postCount = Post::where('slug', $slug)->count();
        if($postCount <= 0){
            return $slug;
        }
        if (!$this->checkInDatabase($slug, $i)) {

            return $slug = $slug . '-' . $i;
        }

        $i = $i + 1;
        return $this->checkIfExist($slug, $i);
    }
 
    public function checkInDatabase($slug, $i)
    {

        $slug = $slug . '-' . $i;
        $postCount = Post::where('slug', $slug)->count();
        if ($postCount > 0) {
            return true;
        } else
            return false;
    }
   
