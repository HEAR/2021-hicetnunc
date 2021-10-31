# https://gist.github.com/ronekko/dc3747211543165108b11073f929b85e
# -*- coding: utf-8 -*-
"""
Created on Thu Jun 22 16:44:27 2017
@author: sakurai
"""


# import numpy as np
# import cv2
# import screeninfo

# if __name__ == '__main__':
#     screen_id = 0
#     is_color = True

#     # get the size of the screen
#     screen = screeninfo.get_monitors()[screen_id]
#     width, height = screen.width, screen.height

#     # create image
#     if is_color:
#         image = np.ones((height, width, 3), dtype=np.float32)
#         image[:10, :10] = 0  # black at top-left corner
#         image[height - 10:, :10] = [1, 0, 0]  # blue at bottom-left
#         image[:10, width - 10:] = [0, 1, 0]  # green at top-right
#         image[height - 10:, width - 10:] = [0, 0, 1]  # red at bottom-right
#     else:
#         image = np.ones((height, width), dtype=np.float32)
#         image[0, 0] = 0  # top-left corner
#         image[height - 2, 0] = 0  # bottom-left
#         image[0, width - 2] = 0  # top-right
#         image[height - 2, width - 2] = 0  # bottom-right

#     window_name = 'projector'
#     cv2.namedWindow(window_name, cv2.WND_PROP_FULLSCREEN)
#     cv2.moveWindow(window_name, screen.x - 1, screen.y - 1)
#     cv2.setWindowProperty(window_name, cv2.WND_PROP_FULLSCREEN,
#                           cv2.WINDOW_FULLSCREEN)
#     cv2.imshow(window_name, image)
#     cv2.waitKey()
#     cv2.destroyAllWindows()
    
    
    
    
    
    
# import numpy as np
# import cv2

# cap = cv2.VideoCapture(0)

# while(cap.isOpened()):
#     ret, frame = cap.read()
#     if ret == True:
#         cv2.namedWindow("window", cv2.WND_PROP_FULLSCREEN)
#         cv2.setWindowProperty("window",cv2.WND_PROP_FULLSCREEN,
#             cv2.WINDOW_FULLSCREEN)
#         cv2.imshow('window',frame)
#         if cv2.waitKey(30) & 0xFF == ord('q'):
#             break
#     else:
#         break

# cap.release()
# cv2.destroyAllWindows()





# https://www.alirookie.com/post/python-opencv-fullscreen-webcam-video-improve-image-quality
# https://answers.opencv.org/question/198479/display-a-streamed-video-in-full-screen-opencv3/
# https://www.analyticsvidhya.com/blog/2021/05/image-processing-using-numpy-with-practical-implementation-and-code/
import cv2
import ctypes
import screeninfo
import numpy as np

WINDOW_NAME = 'Full Integration'

# initialize video capture object to read video from external webcam
video_capture = cv2.VideoCapture(0)
# if there is no external camera then take the built-in camera
if not video_capture.read()[0]:
    video_capture = cv2.VideoCapture(0)

# Full screen mode 
# WND_PROP_FULLSCREEN VS WINDOW_FREERATIO
cv2.namedWindow(WINDOW_NAME, cv2.WINDOW_FREERATIO)
cv2.setWindowProperty(WINDOW_NAME, cv2.WND_PROP_FULLSCREEN, cv2.WINDOW_FULLSCREEN)


while (video_capture.isOpened()):
    # get Screen Size
    # user32 = ctypes.windll.user32
    screen = screeninfo.get_monitors()[0]
    screen_width, screen_height = screen.width, screen.height

    # read video frame by frame
    ret, frame = video_capture.read()

    frame = cv2.flip(frame, 1)

    frame_height, frame_width, _ = frame.shape

    scaleWidth = float(screen_width)/float(frame_width)
    scaleHeight = float(screen_height)/float(frame_height)

    
    # print(screen_width, screen_height)
    # 1440 900
    # print(frame_width, frame_height)
    # 1280 720 => 1440, 810 (1.125) || 1600, 900 (1.25)
    # print(scaleWidth, scaleHeight)
    # 1.125 1.25
    # 
    ratioScreen = float(screen_width/screen_height)
    ratioCapture = float(frame_width/frame_height)
    # print(ratioScreen)
    # 1.6 screen
    # print(ratioCapture)
    # 1.7777777 capture

    # imgScale = min(scaleWidth, scaleHeight)
    
    img = np.array(frame)

    # Y1 : Y2 , X1 : X2
    # img2 = img[0:720, 280:280+720]


    if ratioScreen < ratioCapture :
        # print("<") True

        capH = frame_height
        capY = 0
        capW = int(frame_height * ratioScreen)
        capX = int((frame_width - capW)/2)

        imgScale = scaleHeight

        # 896 x 720
        # 960 x 720

    else :
        # print(">=")
        capH = int(frame_width * ratioScreen)
        capY = int((frame_height - capH)/2)
        capW = frame_width 
        capX = 0
        

        imgScale = scaleWidth

    print(capX, capW+capX, capY, capH+capY)
    # 240 800 0 720

    img2 = img[capY:capY+capH, capX:capX+capW]
    # img2 = np.array(img2).resize((1440,900))

    # if scaleHeight>scaleWidth: # true
    #     # print("scaleHeight>scaleWidth")
    #     imgScale = scaleWidth

    # else:
    #     # print("scaleHeight<scaleWidth")
    #     imgScale = scaleHeight

    

    # newX,newY = int(frame.shape[1]*imgScale), int(frame.shape[0]*imgScale)
    newX, newY = screen_width, screen_height

    # print(newX, newY)
    img2 = cv2.resize(img2,(newX,newY))
    # img2 = cv2.resize(img2,(screen_width,screen_height))
    cv2.imshow(WINDOW_NAME, img2)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# release video capture object
video_capture.release()
cv2.destroyAllWindows()
