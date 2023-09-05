<?php

//format tags for news post edit
function formatTags(array $tags): String
{
    return implode(',', $tags);
}
