ALTER TABLE isuumo.estate ADD door_long INTEGER NOT NULL;
ALTER TABLE isuumo.estate ADD door_short INTEGER NOT NULL;


UPDATE isuumo.estate SET door_long = GREATEST(door_height, door_width);
UPDATE isuumo.estate SET door_short = LEAST(door_height, door_width);
