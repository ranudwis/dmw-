import { PDFDocument } from 'pdf-lib'

const DEFAULT_BORDER_LENGTH = 60;

export default class QuestionMaker {
    constructor() {
        this.border = 0
    }

    async make(file) {
        const arrayBuffer = await file.arrayBuffer()
        const originalDocument = await PDFDocument.load(arrayBuffer)
        const finishedDocument = await PDFDocument.create()
        const embeddedPages = await finishedDocument.embedPages(originalDocument.getPages())

        embeddedPages.forEach(page => {
            const newPage = finishedDocument.addPage()

            newPage.drawPage(page, {
                x: this.border,
                y: this.border,
                width: newPage.getWidth() - (2 * this.border),
                height: newPage.getHeight() - (2.5 * this.border),
            })
        })

        return finishedDocument
    }

    withBorder(flag) {
        this.border = flag ? DEFAULT_BORDER_LENGTH : 0

        return this
    }
}
