/**
 * https://www.pdftron.com/api/web/CoreControls.DocumentViewer.html#rotateClockwise__anchor
 * @fires fitModeUpdated on DocumentViewer
 * @see https://www.pdftron.com/api/web/CoreControls.DocumentViewer.html#event:fitModeUpdated__anchor
 * @fires zoomUpdated on DocumentViewer
 * @see https://www.pdftron.com/api/web/CoreControls.DocumentViewer.html#event:zoomUpdated__anchor
 */
export default () => {
  window.docViewer.rotateClockwise();
};
