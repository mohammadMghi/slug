 public function checkIfExist($slug)
    {
        $j = 0;
        $postCount = Post::where('slug', $slug)->count();
        if ($postCount > 0) {
            while ($j >= 0) {
                $j = $j + 1;
                if ($this->checkInDatabase($slug, $j)) { 
                    //nothing
                } else { 
                    return $slug = $slug . '-' . $j;
                    $j = -1;
                }
            }
        }
        return $slug;
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
