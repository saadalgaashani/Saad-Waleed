CREATE TABLE riddles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    riddle VARCHAR(255) NOT NULL,
    answer VARCHAR(100) NOT NULL,
    hint VARCHAR(255),
    roomId INT NOT NULL
);

INSERT INTO riddles (riddle, answer, hint, roomId)
VALUES
-- Room 1 (roomId = 1)
('I have cities, but no houses. I have mountains, but no trees. I have water, but no fish. What am I?', 'map', 'paper', 1),
('The more you take, the more you leave behind. What are they?', 'footsteps', 'walking', 1),
('I can be cracked, made, told, and played. What am I?', 'joke', 'funny', 1),

-- Room 2 (roomId = 2)
('I am not alive, but I grow. I do not have lungs, but I need air. I do not have a mouth, but water kills me. What am I?', '', 'heat', 2),
('I go up, but never come down. What am I?', 'age', 'time', 2),
('I can fill a room but take up no space. What am I?', 'light', 'lamp', 2),

-- Room 3 (roomId = 3)
('I have many teeth, but I cannot bite. What am I?', 'comb', 'hair', 3),
('If you drop me, I will crack. If you smile at me, I will smile back. What am I?', 'mirror', 'reflection', 3),
('I am always in front of you but cannot be seen. What am I?', 'future', 'tomorrow', 3);