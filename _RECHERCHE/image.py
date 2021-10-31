# https://www.life2coding.com/resize-opencv-window-according-screen-resolution/

import cv2
import numpy as np

def main():
    #load the image
    img = cv2.imread('capture.png')

    #define the screen resulation
    screen_res = 1280, 720
    scale_width = screen_res[0] / img.shape[1]
    scale_height = screen_res[1] / img.shape[0]
    scale = min(scale_width, scale_height)

    #resized window width and height
    window_width = int(img.shape[1] * scale)
    window_height = int(img.shape[0] * scale)

    #cv2.WINDOW_NORMAL makes the output window resizealbe
    cv2.namedWindow('Resized Window', cv2.WINDOW_NORMAL)

    #resize the window according to the screen resolution
    cv2.resizeWindow('Resized Window', window_width, window_height)

    cv2.imshow('Resized Window', img)
    cv2.waitKey(0)
    cv2.destroyAllWindows()

if __name__ == "__main__":
    main()