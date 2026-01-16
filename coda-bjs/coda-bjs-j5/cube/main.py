import pygame as pg
import math
from random import randint

pg.init()
w, h = pg.display.Info().current_w, pg.display.Info().current_h
fps = 144
screen = pg.display.set_mode((w, h))
pg.display.set_caption("runner")

def hex_points(cx, cy, R):
    return [
        (cx + R * math.cos(math.radians(60 * k)),
         cy + R * math.sin(math.radians(60 * k)))
        for k in range(6)
    ]

R = 30
cols = 36
rows = 36
hex_height = R * math.sqrt(3)

walls = []

def hex_to_pixel(q, r, R):
    x = R * 3/2 * q
    y = hex_height * (r + q/2)
    return x, y

def pixel_to_axial(x, y, R):
    q = (2/3) * x / R
    r = (-1/3) * x / R + (1/math.sqrt(3)) * y / R
    return q, r

def draw_hex_grid(surface, R, cam_x, cam_y, player):
    center_world_x = player.world_x
    center_world_y = player.world_y

    center_qf, center_rf = pixel_to_axial(center_world_x, center_world_y, R)
    center_q = round(center_qf)
    center_r = round(center_rf)

    half_cols = cols // 2
    half_rows = rows // 2

    for dq in range(-half_cols, half_cols):
        for dr in range(-half_rows, half_rows):
            q = center_q + dq
            r = center_r + dr

            radius = min(half_cols, half_rows)
            if abs(dq) + abs(dr) > radius * 2:
                continue

            cx, cy = hex_to_pixel(q, r, R)

            sx = cx - cam_x
            sy = cy - cam_y

            pts = hex_points(sx, sy, R)
            pg.draw.polygon(surface, (100, 100, 100), pts, width=1)

class Player:
    def __init__(self):
        self.world_x = 0
        self.world_y = 0
        self.size = 5
        self.color = (0, 128, 255)
        self.speed = 1
        self.speed_max = 3
        self.health = 100

    def draw(self, screen):
        pg.draw.rect(
            screen,
            self.color,
            (w//2 - self.size//2, h//2 - self.size//2, self.size, self.size)
        )

    def move(self, keys):
        if keys[pg.K_q] and keys[pg.K_z]:
            self.world_x -= self.speed / math.sqrt(2)
            self.world_y -= self.speed / math.sqrt(2)

        elif keys[pg.K_q] and keys[pg.K_s]:
            self.world_x -= self.speed / math.sqrt(2)
            self.world_y += self.speed / math.sqrt(2)

        elif keys[pg.K_d] and keys[pg.K_z]:
            self.world_x += self.speed / math.sqrt(2)
            self.world_y -= self.speed / math.sqrt(2)

        elif keys[pg.K_d] and keys[pg.K_s]:
            self.world_x += self.speed / math.sqrt(2)
            self.world_y += self.speed / math.sqrt(2)

        elif keys[pg.K_q]:
            self.world_x -= self.speed
        elif keys[pg.K_d]:
            self.world_x += self.speed
        elif keys[pg.K_z]:
            self.world_y -= self.speed
        elif keys[pg.K_s]:
            self.world_y += self.speed


class Enemy:
    def __init__(self, x, y):
        self.world_x = x
        self.world_y = y
        self.size = 5
        self.color = (255, 0, 0)
        self.dist_see = 250
        
    def draw(self, screen, cam_x, cam_y, draw_circle):
        screen_x = self.world_x - cam_x
        screen_y = self.world_y - cam_y
        pg.draw.rect(
            screen,
            self.color,
            (screen_x - self.size//2, screen_y - self.size//2, self.size, self.size)
        )
        if draw_circle == True:
            pg.draw.circle(screen, (225, 223, 0), (screen_x, screen_y), self.dist_see, width=1)
    def move(self, dx, dy):
        self.world_x += dx
        self.world_y += dy
    def check_collision(self, player):
        dist_x = self.world_x - player.world_x
        dist_y = self.world_y - player.world_y
        distance = math.sqrt(dist_x**2 + dist_y**2)
        return distance < (self.size + player.size) / 2
    def kill(self, screen, cam_x, cam_y):
        screen_x = self.world_x - cam_x
        screen_y = self.world_y - cam_y
        pg.draw.rect(screen, (255, 0, 0), (screen_x - self.size//2, screen_y - self.size//2, self.size, self.size))
        pg.display.flip()
        pg.draw.rect(screen, (255, 255, 255), (screen_x - self.size//2, screen_y - self.size//2, self.size, self.size))

def create_wall(x1, y1, x2, y2):
    walls.append(((x1, y1), (x2, y2)))

def main():
    clock = pg.time.Clock()
    player = Player()
    running = True
    enemies = [Enemy(randint(-1000, 1000), randint(-1000, 1000)) for _ in range(150)]
    draw_circle = False

    create_wall(-1000, -1000, 1000, -1000)
    create_wall(-1000, 1000, 1000, 1000)
    create_wall(-1000, -1000, -1000, 1000)
    create_wall(1000, -1000, 1000, 1000)

    while running:
        screen.fill((0, 0, 0))

        cam_x = player.world_x - w/2
        cam_y = player.world_y - h/2

        for wall in walls:
            (x1, y1), (x2, y2) = wall
            sx1 = x1 - cam_x
            sy1 = y1 - cam_y
            sx2 = x2 - cam_x
            sy2 = y2 - cam_y
            pg.draw.line(screen, (255, 255, 255), (sx1, sy1), (sx2, sy2), 1)

        font=pg.font.Font(None, 24)
        health_text = font.render(f"{player.health}",1,(255,255,255))

        draw_hex_grid(screen, R, cam_x, cam_y, player)

        for event in pg.event.get():
            if event.type == pg.QUIT:
                running = False
            if event.type == pg.KEYDOWN:
                if event.key == pg.K_ESCAPE:
                    running = False
                if event.key == pg.K_LSHIFT:
                    player.speed = player.speed_max
                if event.key == pg.K_RSHIFT:
                    player.speed = player.speed_max
                if event.key == pg.K_c:
                    draw_circle = not draw_circle

            if event.type == pg.KEYUP:
                if event.key == pg.K_LSHIFT:
                    player.speed = 1

        keys = pg.key.get_pressed()
        player.move(keys)
        player.draw(screen)

        for enemy in enemies:
            enemy.draw(screen, cam_x, cam_y, draw_circle)
            if abs(player.world_x - enemy.world_x) <= enemy.dist_see and abs(player.world_y - enemy.world_y) <= enemy.dist_see:
                if abs(player.world_x - enemy.world_x) <= enemy.dist_see and abs(player.world_y - enemy.world_y) <= enemy.dist_see:
                    enemy.move((player.world_x - enemy.world_x) / 150, (player.world_y - enemy.world_y) / 150)
                if abs(player.world_x - enemy.world_x) <= 100 and abs(player.world_y - enemy.world_y) <= 100:
                    enemy.move((player.world_x - enemy.world_x) / 120, (player.world_y - enemy.world_y) / 80)
                if abs(player.world_x - enemy.world_x) <= 75 and abs(player.world_y - enemy.world_y) <= 75:
                    enemy.move((player.world_x - enemy.world_x) / 100, (player.world_y - enemy.world_y) / 80)
                if abs(player.world_x - enemy.world_x) <= 25 and abs(player.world_y - enemy.world_y) <= 25:
                    enemy.move((player.world_x - enemy.world_x) / 2, (player.world_y - enemy.world_y) / 2)

            else:
                now = pg.time.get_ticks()
                if not hasattr(enemy, "next_move_time"):
                    enemy.next_move_time = 0
                if now >= enemy.next_move_time:
                    enemy.alea_x = randint(-1, 1)
                    enemy.alea_y = randint(-1, 1)
                    enemy.next_move_time = now + 600
                enemy.move(enemy.alea_x, enemy.alea_y)
            if enemy.check_collision(player):
                enemy.kill(screen, cam_x, cam_y)
                enemies.remove(enemy)
                player.health -= 1


        if player.health <= 0:
            print("Game Over")
            running = False

        if player.world_x < -1000:
            player.world_x = -999
        if player.world_x > 1000:
            player.world_x = 999
        if player.world_y < -1000:
            player.world_y = -999
        if player.world_y > 1000:
            player.world_y = 999

        for enemy in enemies:
            if enemy.world_x < -1000 or enemy.world_x > 1000 or enemy.world_y < -1000 or enemy.world_y > 1000:
                enemy.world_x, enemy.world_y = (randint(-1000, 1000), randint(-1000, 1000))

        screen.blit(health_text, (10, 10))
        pg.display.flip()
        clock.tick(fps)

    pg.quit()

if __name__ == "__main__":
    main()