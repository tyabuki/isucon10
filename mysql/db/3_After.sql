UPDATE isuumo.estate SET door_long = GREATEST(door_height, door_width);
UPDATE isuumo.estate SET door_short = LEAST(door_height, door_width);
