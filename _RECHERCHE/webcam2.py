#! /usr/bin/env python3
"""
Access webcam with opencv-python.
Keyboard control:
g      Toggle convert frames to grayscale
f      Toggle Fullscreen (also with mouse double click)
m      Toggle flipping (mirror) the frames
s      Save frame to file in current working directory
q      Quit
Esc    Quit
"""
# https://gist.github.com/saaketp/a430c5304a4ec49bb8092cb9bd01df8a
# https://tkdocs.com/tutorial/install.html
# brew install python-tk

from datetime import datetime
import os
import argparse
import tkinter as tk
import cv2

root = tk.Tk()

screen_width = root.winfo_screenwidth()
screen_height = root.winfo_screenheight()

parser = argparse.ArgumentParser(description=__doc__,
                                 formatter_class=argparse.RawTextHelpFormatter)
parser.add_argument('-W', '--Width', type=int, default=screen_width,
                    help="Width of the frames")
parser.add_argument('-H', '--Height', type=int, default=screen_height,
                    help="Height of the frames")
parser.add_argument('-d', '--directory', default=os.getcwd(),
                    help="Current working directory to save images")

args = parser.parse_args()

cap = cv2.VideoCapture(0)
cap.set(cv2.CAP_PROP_FRAME_WIDTH, args.Width)
cap.set(cv2.CAP_PROP_FRAME_HEIGHT, args.Height)

gray = False
fullscreen = False
flip = False


def fullscreen_double_click(event, x, y, flags, param):
    global fullscreen
    if event == cv2.EVENT_LBUTTONDBLCLK:
        fullscreen = not fullscreen


cv2.namedWindow("Cam", cv2.WINDOW_NORMAL)
cv2.resizeWindow("Cam", args.Width, args.Height)
cv2.setMouseCallback("Cam", fullscreen_double_click)

try:
    while True:
        # Capture frame-by-frame
        ret, frame = cap.read()
        # Our operations on the frame come here
        if gray:
            frame = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
        if fullscreen:
            cv2.setWindowProperty("Cam", cv2.WND_PROP_FULLSCREEN,
                                  cv2.WINDOW_FULLSCREEN)
        else:
            cv2.setWindowProperty("Cam", cv2.WND_PROP_FULLSCREEN,
                                  cv2.WINDOW_NORMAL)
        if flip:
            frame = cv2.flip(frame, 1)
        # Display the resulting frame
        cv2.imshow('Cam', frame)
        c = cv2.waitKey(1) & 0xFF
        if c in [ord('g'), ord('G')]:
            gray = not gray
        elif c in [ord('f'), ord('F')]:
            fullscreen = not fullscreen
        elif c in [ord('m'), ord('M')]:
            flip = not flip
        elif c in [ord('s'), ord('S')]:
            cv2.imwrite(os.path.join(
                args.directory,
                datetime.strftime(datetime.today(),
                                  "%Y-%m-%d-%H-%M-%S.jpg")),
                        frame)
        elif c in [ord('q'), ord('Q'), 0x1b]:
            break
finally:
    # When everything done, release the capture
    cap.release()
    cv2.destroyAllWindows()